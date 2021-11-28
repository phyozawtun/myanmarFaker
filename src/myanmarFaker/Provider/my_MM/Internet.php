<?php
namespace myanmarFaker\Provider\my_MM;

class Internet extends \myanmarFaker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com'];
    protected static $tld = ['com.mm', 'com', 'com', 'com', 'gov.mm', 'biz.mm', 'biz', 'info', 'net', 'org'];

    protected static $userNameFormats = [
        '{{lastNameEn}}.{{firstNameEn}}',
        '{{firstNameEn}}.{{lastNameEn}}',
        '{{firstNameEn}}##',
        '?{{lastNameEn}}',
    ];
    protected static $emailFormats = [
        '{{userName}}@{{domainName}}',
        '{{userName}}@{{freeEmailDomain}}',
    ];
    protected static $urlFormats = [
        'http://www.{{domainName}}/',
        'http://{{domainName}}/',
        'http://www.{{domainName}}/{{slug}}',
        'http://www.{{domainName}}/{{slug}}',
        'https://www.{{domainName}}/{{slug}}',
        'http://www.{{domainName}}/{{slug}}.html',
        'http://{{domainName}}/{{slug}}',
        'http://{{domainName}}/{{slug}}',
        'http://{{domainName}}/{{slug}}.html',
        'https://{{domainName}}/{{slug}}.html',
    ];

    /**
     * @see https://tools.ietf.org/html/rfc1918#section-3
     */
    protected static $localIpBlocks = [
        ['10.0.0.0', '10.255.255.255'],
        ['172.16.0.0', '172.31.255.255'],
        ['192.168.0.0', '192.168.255.255'],
    ];

    public function domainWord()
    {
        $lastName = $this->generator->format('lastNameEn');

        $lastName = strtolower(static::transliterate($lastName));

        // check if transliterate() didn't support the language and removed all letters
        if (trim($lastName, '._') === '') {
            throw new \Exception('domainWord failed with the selected locale. Try a different locale or activate the "intl" PHP extension.');
        }

        // clean possible trailing dot from last name
        $lastName = rtrim($lastName, '.');

        return $lastName;
    }



}
