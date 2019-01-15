<?php
/**
 * Class Router
 */
namespace model;
use controller\AudioController;

class Router
{
    /**
     * @param string $url
     * @param AudioController $object
     * @throws \Exception
     */
    public function getMethod($url, $object)
    {
        $url = explode('?', $url);
        $trueUrl = $url[0];
        if(method_exists($object, $trueUrl)){
            $object->$trueUrl();
        }else{
            throw new \Exception('Page not found');
        }
    }

    /**
     * Create URL for sorting table
     * @param $field
     * @return string
     */
    public static function createSortUrl($field)
    {
        $url = '';
        if(isset($_GET['sort_type']) && $_GET['sort_type'] == 'asc') {
            $url .= '/sort?sort_field='.$field.'&sort_type=desc';
        } else {
            $url .= '/sort?sort_field='.$field.'&sort_type=asc';
        }
        if(isset($_GET['search_field']) && isset($_GET['search_value'])) {
            $url .= '&search_field='.$_GET['search_field'].'&search_value='.$_GET['search_value'];
        }

        return $url;
    }

    /**
     * Create Url for search table
     * @param $field
     * @param $value
     * @return string
     */
    public static function createSearchUrl($field, $value)
    {
        $url = '/sort?search_field='.$field.'&search_value='.$value;

        if(isset($_GET['sort_type']) && isset($_GET['sort_field'])) {
            $url .= '&sort_field='.$_GET['sort_field'].'&sort_type='.$_GET['sort_type'];
        }

        return $url;
    }
}