<?php namespace Dynamedia\Posts\Models;

use Dynamedia\Posts\Classes\Body\Body;
use Model;
use Dynamedia\Posts\Traits\SeoTrait;
use Dynamedia\Posts\Traits\ImagesTrait;
use Dynamedia\Posts\Traits\ControllerTrait;
use \October\Rain\Database\Traits\Validation;
use RainLab\Translate\Classes\Translator;
use RainLab\Translate\Models\Locale;
use ValidationException;

/**
 * CategoryTranslation Model
 */
class CategoryTranslation extends Model
{
    use SeoTrait, ImagesTrait, ControllerTrait, Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'dynamedia_posts_category_translations';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = [
        'body_document',
        'images',
        'seo',
    ];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'native' => ['Dynamedia\Posts\Models\Category'],
        'locale' => ['Rainlab\Translate\Models\Locale'],
    ];
    public $belongsToMany = [
        'categoryslugs' => [
            'Dynamedia\Posts\Models\CategorySlug',
            'table' => 'dynamedia_posts_category_trans_slug',
            'key'       => 'trans_id',
            'otherKey'  => 'slug_id',
            'order' => 'id'
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    // todo move this into a custom validation rule
    public function beforeValidate()
    {
        if (!CategorySlug::isAvailable($this->native->id, $this->slug)) {
            throw new ValidationException(['slug' => "Slug is not available"]);
        }
    }

    public function beforeSave()
    {
        $this->body_text = $this->body->getTextContent();
    }

    public function afterSave()
    {
        $slug = $this->native->categoryslugs()->firstOrCreate([
            'slug' => $this->slug,
        ]);
        $this->categoryslugs()->sync($slug->id, false);
    }

    public function beforeDelete()
    {
        // Remove the pivot record but don't attempt to delete the slug record. It can still resolve to the tag
        $this->categoryslugs()->detach();
    }

    /**
     * Return the options for the available translation locales
     *
     * @return array
     */
    public function getLocaleIdOptions()
    {
        $usedIds = [];
        $formVars = post('Category');
        if (!empty($formVars)) {
            $parentCategory = Category::where('slug', $formVars['slug'])
                ->with('translations')
                ->first();

            $usedIds[] = Translator::instance()->getDefaultLocale();
            foreach ($parentCategory->translations as $translation) {
                $usedIds[] = $translation->locale_id;
            }
        }

        $locales = Locale::whereNotIn('id', $usedIds)
            ->whereNotIn('code', [Translator::instance()->getDefaultLocale()])
            ->order()
            ->pluck('name', 'id')
            ->all();

        return $locales;
    }

    public function filterFields($fields, $context = null)
    {
        // Body Type
        if (isset($fields->body_type)) {

            if ($fields->body_type->value == 'repeater_body') {
                $fields->repeater_body->hidden = false;
                $fields->richeditor_body->hidden = true;
                $fields->markdown_body->hidden = true;
            }
            elseif ($fields->body_type->value == 'richeditor_body') {
                $fields->repeater_body->hidden = true;
                $fields->richeditor_body->hidden = false;
                $fields->markdown_body->hidden = true;

            }
            elseif ($fields->body_type->value == 'markdown_body') {
                $fields->repeater_body->hidden = true;
                $fields->richeditor_body->hidden = true;
                $fields->markdown_body->hidden = false;
            }
            else {
                $fields->repeater_body->hidden = false;
                $fields->richeditor_body->hidden = true;
                $fields->markdown_body->hidden = true;
            }
        }
    }

    /**
     * @return mixed body object by body_document body_type
     */
    public function getBodyAttribute()
    {
        $body = Body::getBody($this->body_document);
        return $body;
    }

    /**
     * Get the url of the translation.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return $this->native->getUrlInLocale($this->locale->code);
    }
}
