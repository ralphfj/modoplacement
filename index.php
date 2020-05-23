<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'placementtest_english.php';
        break;
    case '/placementtest_business_english.php':
        require 'placementtest_english.php';
        break;
    case '/placementtest_business_english.php':
        require 'placementtest_english.php';
        break;
    case '/placementtest_french.php':
        require 'placementtest_french.php';
        break;
    case '/placementtest_german.php':
        require 'placementtest_german.php';
        break;
    case '/placementtest_italian.php':
        require 'placementtest_italian.php';
        break;
    case '/placementtest_spanish.php':
        require 'placementtest_spanish.php';
        break;
    case '/einstufungstest_englisch.php':
        require 'einstufungstest_englisch.php';
	break;
    case '/einstufungstest_deutsch.php':
        require 'einstufungstest_englisch.php';
	break;
    case '/einstufungstest_franzoesisch.php':
        require 'einstufungstest_franzoesisch.php';
	break;
    case '/einstufungstest_italienisch.php':
        require 'einstufungstest_italienisch.php';
	break;
    case '/einstufungstest_spanisch.php':
        require 'einstufungstest_spanisch.php';
	break;
    case '/placementtest.process.php':
        require 'placementtest.process.php';
	break;

    default:
        http_response_code(404);
        exit('Not Found');
}
?>
