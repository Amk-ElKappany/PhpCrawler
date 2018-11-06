<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;

/**
 * Controller manage any action on urls
 *
 * @author Alaa M. El-Kabbany at 5 Novmber 2018
 */
class UrlOperator extends Controller
{
    /**
     * The target url to crawl.
     *
     * @var String
     */
    protected $url;

    /**
     * The Needed Regular Expression to retrieve all links inside the
     * given url in DOMDocument solution method.
     *
     * @var String
     */
    protected $domRegEx;

    /**
     * The Needed Regular Expression to retrieve all links inside the
     * given url in CURL solution method.
     *
     * @var String
     */
    protected $curlRegEx;

    /**
     * Constructor Initiates class URL and RegEx vars to the propitiate
     * Task, and Solutions types as well.
     *
     **NOTE: According to the task description those that occurs are up to 20 times,
     * so the RegEx. is focused on numerical IDs only.
     * Otherwise RegEx. should be replaced by the commented RegEx (only in The Simple Task),
     * and it would be 22 times occurrence exactly.
     *
     * @return void
     */

    public function __construct()
    {
        switch (Config::get('task'))
        {
            case 'The Simple Task':
                $this->url = 'https://www.homegate.ch/mieten/immobilien/kanton-zuerich/trefferliste?ep=';

                $this->domRegEx = "/\w*\/(?=\d)[0-9]*/";
                //$this->domRegEx = "/(\S*/\w*[0-9])/";                       //replace if IDs is alphanumerical up to 22X link

                $this->curlRegEx = "/^<a.*\shref=\"(\S*\/[0-9]*)\"/m";
                //$this->curlRegEx = "/^<a.*\shref="((\S*/\w*[0-9])*)"/m";    //replace if IDs is alphanumerical up to 22x link
                break;
            case 'The Advanced Task':
                $this->url = 'http://www.alice.com/folder/simple-php-proxy/src/de/kaufen/suchen/haus_wohnung/kanton_zuerich/liste.aspx?p=';  // Bypass Proxy Library
                //$this->url = 'https://www.newhome.ch/de/kaufen/suchen/haus_wohnung/kanton_zuerich/liste.aspx?p=';        //the orginal url
                $this->domRegEx = "/(h|f)\S*\&id\S*(?=\")/";
                $this->curlRegEx = $this->domRegEx;
                break;

        }
    }

    /**
     * A function that validates the REAL existence of the requested URL page.
     **NOTE: As The URL handel wrong page numbers by ALWAYS retrieving the last page,
     * so validate The existence of requested page by validating URL header is not applicable in this URL
     * Validation done by making sure that the requested page number is within the pagination links
     * of the last validated page already.
     *
     * @param Integer $previous_page_number, the last validated url page number (previous page)
     * @param Integer $page_number, the target url page number
     *
     * @author Alaa M. El-Kabbany at 5 Novmber 2018
     * @return boolean
     */
    public function validateURL($previous_page_number, $page_number)
    {
        $html = file_get_contents(($this->url.''.$previous_page_number));
        $url = parse_url($this->url);

        if(strpos($html, ($url['path'].'?'.$url['query'].$page_number)) !== false)
            return true;
        else
            return false;
    }

    /**
     * A function that manges to load URL HTML content using DOMDocument Class,
     * search for only links that contains IDs and returns them.
     *
     * @param Integer $page_number, the target url page number
     *
     * @author Alaa M. El-Kabbany at 5 Novmber 2018
     * @return array
     */
    public function loadHtmlUsingDom($page_number)
    {
        $content = new \DOMDocument();
        libxml_use_internal_errors(true);
        $content->loadHTML(file_get_contents(($this->url.''.$page_number)));
        libxml_use_internal_errors(false);

        $link_list = $content->getElementsByTagName('a');

        $links = [];
        foreach ($link_list as $key => $link)
            if(preg_match($this->domRegEx, $link->getAttribute('href')))
                $links[] = $link->getAttribute('href');

        return $links;
    }

    /**
     * A function that manges to load URL HTML content using CURL Library,
     * Search for only links that contains IDs and returns them.
     *
     * @param Integer $page_number, the target url page number
     *
     * @author Alaa M. El-Kabbany at 5 Novmber 2018
     * @return array
     */

    public function loadHtmlUsingCurl($page_number)
    {
        $handle = curl_init();
        $timeout=5;

        curl_setopt($handle, CURLOPT_URL, $this->url.''.$page_number);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, $timeout);


        // Get URL content
        $content= curl_exec($handle);
        // close handle to release resources
        curl_close($handle);

        $matches = [];
        preg_match_all($this->curlRegEx, $content, $matches, PREG_PATTERN_ORDER);

        return $matches[1];
    }

}
