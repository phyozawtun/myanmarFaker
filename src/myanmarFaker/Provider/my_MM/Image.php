<?php

namespace myanmarFaker\Provider\my_MM;

/**
 * Depends on image generation from 
 */
class Image extends \myanmarFaker\Provider\Image
{
    /**
     * @var string
     */
    public const BASE_URL = 'https://source.unsplash.com';

    /**
     * @var array
     *
     * @deprecated Categories are no longer used as a list in the placeholder API but referenced as string instead
     */
    protected static $categories = [
        'yangon', 
        'mandalay', 
        'bagan', 
        'inle', 
        'innwa', 
        'nyaungu', 
        'shwedagon',
        'phaean',
    ];

    /**
     * Generate the URL that will return a random image
     *
     * Set randomize to false to remove the random GET parameter at the end of the url.
     *
     * @example 'https://source.unsplash.com/2440x2440/?nature'
     *
     * @param int         $width
     * @param int         $height
     * @param string|null $category
     * @param bool        $randomize
     * @param string|null $word
     * @param bool        $gray
     *
     * @return string
     */
    public static function imageUrl(
        $width = 640,
        $height = 480,
        $category = null,
        $randomize = true,
        $word = null,
        $gray = false
    ) {
        $size = sprintf('%dx%d', $width, $height);

        $imageParts = [];
        $imageParts[] = $category;
        $imageParts[] = static::randomElement(self::$categories);
        $imagePartsPrefix = "myanmar";
        $backgroundColor = '';

        return sprintf(
            '%s/%s/%s',
            self::BASE_URL,
            $size,
            count($imageParts) > 0 ? '?'.$imagePartsPrefix . implode(',', $imageParts) : ''
        );
    }


}
