<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;

/**
 * Controller contains actions perform "Simple Task" section tasks using DOMDocuments Class
 *
 * @author Alaa M. El-Kabbany at 5 Novmber 2018
 */
class DomSimpleTaskOperator extends Controller
{

    /**
     * Constructor.
     *
     * @return void
     */

    public function __construct()
    {
        Config::set('task', 'The Simple Task');
    }

    /**
     * An action that performs task #a in "simple task" section with the given url in the task.
     * "Get only the links that have an ID in their URL"
     *
     * @author Alaa M. El-Kabbany at 5 Novmber 2018
     * @return array
     */
    public function taskA()
    {
        $page_number = 1; // as provided in the URL in the task description
        $operator = new UrlOperator();
        return $operator->loadHtmlUsingDom($page_number);
    }

    /**
     * An action that performs task #b in "simple task" section with the given url in the task.
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
        $pages['page #' . $page_number] = $operator->loadHtmlUsingDom($page_number);

        if($operator->validateURL($page_number, ++$page_number))
            $pages['page #' . $page_number] = $operator->loadHtmlUsingDom($page_number);

        return $pages;
    }

    /**
     * An action that performs additional task #c in "simple task" section,
     * starts with the given url in the task #a, bring the up to 20x link in to array,
     * then proceed to the next page in the url IF it exists until the final page
     * and append the same array, then return this array.
     * "Get only the links that have an ID in their URL"
     *
     *
     * @author Alaa M. El-Kabbany at 5 Novmber 2018
     * @return array
     */
    public function taskC()
    {
        $page_number = 1; // as provided in the URL in the task description
        $pages = [];
        $operator = new UrlOperator();
        $pages['page #' . $page_number] = $operator->loadHtmlUsingDom($page_number);

        while($operator->validateURL($page_number, ++$page_number))
            $pages['page #' . $page_number] = $operator->loadHtmlUsingDom($page_number);

        return $pages;
    }

}
