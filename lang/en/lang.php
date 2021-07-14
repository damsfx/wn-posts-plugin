<?php

return [
    'plugin' => [
        'name'          => 'Posts',
        'description'   => 'Posts for October CMS.'
    ],
    'posts' => [
        'tabs'  => [
            'categories'        => 'Categories',
            'tags'              => 'Tags',
        ],
        'labels' => [
            'is_published'      => 'Published?',
            'published_at'      => 'Published At',
            'published_until'   => 'Published Until',
            'show_contents'     => 'Show Contents?',
            'primary_category'  => 'Primary Category',
            'category_list'     => 'Category List',
            'tags'              => 'Tags',
        ],
        'comments' => [
            'primary_category'  => 'The most relevant category',
            'published_at'      => 'Default to now if published',
            'published_until'   => 'Optional post expiry time',
        ]
    ],

    'categories' => [

    ],

    'tags' => [
        'labels' => [
            'is_approved' => 'Approved?',
        ]
    ],

    'blocks' => [
        'names' => [
          'section'     => 'Section Block',
          'html'        => 'HTML Block',
          'image'       => 'Image Block',
          'cms_content' => 'CMS Content',
          'cms_partial' => 'CMS Partial',
          'page_break'  => 'Page Break',
        ],
        'descriptions' => [
            'section'     => 'Add a content section',
            'html'        => 'Add a block of HTML',
            'image'       => 'Add an image block',
            'cms_content' => 'Add CMS content',
            'cms_partial' => 'Add a CMS partial',
            'page_break'  => 'Add a page break'
        ],
        'tabs'  => [
            'main'  => 'Main',
        ],
        'labels' => [
            'cms_content'       => 'CMS Content',
            'cms_partial'       => 'CMS Partial',
            'html'              => 'HTML Block',
            'section_heading'   => 'Section Heading',
            'section_id'        => 'Section ID',
            'section_content'   => 'Section Content',
            'in_contents'       => 'Include in contents?',
        ]
    ],

    'common' => [
        'tabs' => [
            'detail'        => 'Detail',
            'images'        => 'Images',
            'image'         => 'Image',
            'body'          => 'Body',
            'seo'           => 'SEO',
            'posts'         => 'Posts',
            'settings'      => 'Settings',
            'main'          => 'Main',
        ],
        'labels' => [
            'name'          => 'Name',
            'title'         => 'Title',
            'description'   => 'Description',
            'slug'          => 'Slug',
            'excerpt'       => 'Excerpt',
            'seo'           => 'SEO',
            'posts'         => 'Posts',
            'cms_layout'    => 'CMS Layout',
            'author'        => 'Author',
            'editor'        => 'Editor',
            'block_heading' => 'Section Heading',
            'block_id'      => 'Section ID',
            'block_content' => 'Section Content'
        ]
    ],
    'images' => [
        'tabs' => [
            'list'          => 'List Image',
            'banner'        => 'Banner Image',
            'default'       => 'Default',
            'responsive'    => 'Responsive',
            'social'        => 'Social Images',
            'facebook'      => 'Facebook',
            'twitter'       => 'Twitter',
        ],
        'labels' => [
            'image_select'  => 'Choose an Image',
            'alt_text'      => 'Image Alt Text',
            'css_class'     => 'Image CSS Class',
            'image_style'   => 'Image Style',
            'media_query'   => 'Media Query',
            'screen_width'  => 'Screen Width',
        ],
        'comments' => [
            'facebook' => 'Social sharing image for Facebook',
            'twitter'  => 'Social sharing image for Twitter',
        ],
        'options' => [
            'min_width'     => 'Min Width',
            'max_width'     => 'Max Width',
        ]
    ],
    'seo' => [
        'tabs' => [
            'general'   => 'General',
            'search'    => 'Search',
            'opengraph' => 'Facebook/Opengraph',
            'twitter'   => 'Twitter Cards',
        ],
        'labels' => [
            'post_type'         => 'Post Type',
            'about'             => 'Post is About',
            'keywords'          => 'Keywords',
            'page_title'        => 'Page Title',
            'meta_description'  => 'Meta Description',

        ],
        // Not set in config as these are schema defined and don't need altering
        'dropdown' => [
            'article'       => 'Article',
            'blogPosting'   => 'Blog Post',
            'newsArticle'   => 'News Article',
        ]
    ],

    'settings' => [
        'tabs' => [
            'publisher'     => 'Publisher',
            'posts'         => 'Posts',
            'categories'    => 'Categories',
            'tags'          => 'Tags',
            'users'         => 'Users',
            'cms_layouts'   => 'CMS Layouts',
        ],
        'labels' => [
            'publisher_name'            => 'Publisher Name',
            'publisher_type'            => 'Publisher Type',
            'publisher_url'             => 'Publisher URL',
            'publisher_logo'            => 'Publisher Logo',
            'posts_sort_order'          => 'Posts Sort Order',
            'default_posts_sort_order'  => 'Default Posts Sort Order',
            'posts_per_page'            => 'Posts Per Page',
            'include_subcategories'     => 'List Posts from Sub-Categories',
            'post_page'                 => 'Post Display Page (With Categories)',
            'post_page_no_category'     => 'Post Display Page (No Category)',
            'category_page'             => 'Category Display Page',
            'tag_page'                  => 'Tag Display Page',
            'user_page'                 => 'User Display Page',

        ],
        'dropdown' => [
          'organization'    => 'Organization',
          'person'          => 'Person',
        ],
    ]
];
