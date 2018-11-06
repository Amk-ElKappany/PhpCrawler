<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;


/**
 * Controller contains actions perform "Advanced Task" section tasks using CURL Library
 *
 * @author Alaa M. El-Kabbany at 5 Novmber 2018
 */
class CurlAdvancedTaskOperator extends Controller
{

    /**
     * Constructor.
     *
     * @return void
     */

    public function __construct()
    {
        Config::set('task', 'The Advanced Task');
    }

    /**
     * An action that performs task #a in "advanced task" section with the given url in the task
     * "Get only the links that have an ID in their URL"
     *
     * @author Alaa M. El-Kabbany at 5 Novmber 2018
     * @return array
     */
    public function taskA()
    {
        $page_number = 1; // as provided in the URL in the task description
        $operator = new UrlOperator();
        return $operator->loadHtmlUsingCurl($page_number);
    }

    /**
     * An action that performs task #b in "advanced task" section with the given url in the task
     * "Get only the links that have an ID in their URL"
     *
     * @author Alaa M. El-Kabbany at 5 Novmber 2018
     * @return array
     */
    public function taskB()
    {
        $page_number = 1; // as provided in the URL in the task description
        $pages = [];
        $operator = new UrlOperator();
        $pages['page #' . $page_number] = $operator->loadHtmlUsingCurl($page_number);

        if($operator->validateURL($page_number, ++$page_number))
            $pages['page #' . $page_number] = $operator->loadHtmlUsingCurl($page_number);

        return $pages;
    }
}
