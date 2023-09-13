<?php
    $links = 
    [
        [
            'name' => 'Home',
            'url' => 'http://pegas-cms.localhost/',
            'num' => 0,
        ],
        [
            'name' => 'Blog',
            'url' => 'http://pegas-cms.localhost/blog/',
            'num' => 2,
        ],
        [
            'name' => 'Feedback',
            'num' => 1,
            'child' => [
            [
                'name' => 'List Feedback',
                'url' => 'http://pegas-cms.localhost/feedback/list',
                'num' => 3,
            ],
            [
                'name' => 'Add feedback',
                'url' => 'http://pegas-cms.localhost/feedback/themes/add',
                'num' => 2,
            ],
            [
                'name' => 'Search Feedback',
                'url' => 'http://pegas-cms.localhost/feedback/search/?newsearch=1',
                'num' => 1,
            ],
            ],
        ],
        [
            'name' => 'News',
            'num' => 3,
            'child' => [
                [
                    'name' => 'News List',
                    'url' => 'http://google.com',
                    'num' => 0
                ]
            ]
        ]
    ];


    //Функція для порівння двох змінних в "usort()"
    function Compare($a, $b)
    {
        if($a['num'] === $b['num']) return 0;

        return ($a['num'] < $b['num']) ? -1 : 1;
    }

    //Функція для додавання тегів "li" з "a" всередині
    function AddTags(&$accumulationVar, $linkToAdd, $textToAdd)
    {
        $accumulationVar .= "<li><a href='{$linkToAdd}'>{$textToAdd}</a></li>";
    }

    //Функція для створення списку посилань
    function CreateListOfLinks($arrayOfLinks)
    {
        //Змінна "$tagsList" накопичує у собі теги для формування списку
        $tagsList = "<ul>";

        foreach ($arrayOfLinks as $link) :
            if(array_key_exists('child', $link))
            {
                $tagsList .= "<li>{$link['name']}<ul>";

                foreach($link['child'] as $details):
                    AddTags($tagsList, $details['url'], $details['name']);
                endforeach;

                $tagsList .= "</ul></li>";
            }
            elseif(array_key_exists('url', $link))
            {
                AddTags($tagsList, $link['url'], $link['name']);
            }
        endforeach;

        $tagsList .= "</ul>";
        return $tagsList;
    }


    usort($links, "Compare");
    foreach($links as $link):
        if(array_key_exists("child", $link)) usort($links[$link['num']]["child"], "Compare");
    endforeach;

    echo CreateListOfLinks($links);
