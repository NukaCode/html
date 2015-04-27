<?php namespace NukaCode\Html;

use Collective\Html\HtmlBuilder as CollectiveHtml;

class BBCode
{

    protected $matches = [];

    private   $html;

    public function __construct(CollectiveHtml $html)
    {
        $this->html = $html;
    }

    public function get()
    {
        return $this;
    }

    /**
     * Parse a text and replace the BBCodes
     *
     * @access    public
     *
     * @param    string $data
     *
     * @return    string
     */
    public function parse($data)
    {
        $this->table();
        $this->images();
        $this->text();
        $this->html();

        // Replace everything that has been found
        foreach ($this->matches as $key => $val) {
            $data = preg_replace_callback($key, $val, $data);
        }

        // Replace line-breaks
        return preg_replace_callback("/\n\r?/", function () {
            return '<br />';
        }, $data
        );
    }

    protected function table()
    {
        // Replace [table]...[/table] with <table>...</table>
        $this->matches["/\[table\](.*?)\[\/table\]/is"] = function ($match) {
            $data = preg_replace_callback("/\n\r?/", function () {
                return '';
            }, $match[1]
            );

            return '<table class="table table-hover table-condensed table-striped">' . $data . '</table>';
        };

        $this->thead();
        $this->tbody();
        $this->tr();
        $this->th();
        $this->td();
    }

    protected function images()
    {
        $this->dice();
        $this->bigSmile();
        $this->toungeSmile();
        $this->smile();
        $this->frown();
        $this->cry();
        $this->wink();
        $this->heart();
    }

    protected function text()
    {
        $this->paragraph();
        $this->textPlacement();
        $this->small();
        $this->spoiler();
        $this->code();
        $this->quote();
        $this->size();
        $this->textDecoration();
        $this->center();
        $this->color();
    }

    protected function html()
    {
        $this->spanClass();
        $this->icon();
        $this->fullWidth();
        $this->float();
        $this->email();
        $this->url();
        $this->image();
        $this->lists();
        $this->youtube();
    }

    private function stripBasic($type, $match)
    {
        $data = preg_replace_callback("/\n\r?/", function () {
            return '';
        }, $match[1]
        );

        return '<' . $type . '>' . $data . '</' . $type . '>';
    }

    protected function thead()
    {
        // Replace [thead]...[/thead] with <thead>...</thead>
        $this->matches["/\[thead\](.*?)\[\/thead\]/is"] = function ($match) {
            return $this->stripBasic('thead', $match);
        };
    }

    protected function tbody()
    {
        // Replace [tbody]...[/tbody] with <tbody>...</tbody>
        $this->matches["/\[tbody\](.*?)\[\/tbody\]/is"] = function ($match) {
            return $this->stripBasic('tbody', $match);
        };
    }

    protected function tr()
    {
        // Replace [tr]...[/tr] with <tr>...</tr>
        $this->matches["/\[tr\](.*?)\[\/tr\]/is"] = function ($match) {
            return $this->stripBasic('tr', $match);
        };
    }

    protected function th()
    {
        // Replace [th]...[/th] with <th>...</th>
        $this->matches["/\[th\](.*?)\[\/th\]/is"] = function ($match) {
            return $this->stripBasic('th', $match);
        };

        // Replace [th=CLASS]...[/th] with <th class="CLASS">...</th>
        $this->matches["/\[th=(.*?)\](.*?)\[\/th\]/is"] = function ($match) {
            return '<th class="' . $match[1] . '">' . $match[2] . '</th>';
        };
    }

    protected function td()
    {
        // Replace [td]...[/td] with <td>...</td>
        $this->matches["/\[td\](.*?)\[\/td\]/is"] = function ($match) {
            return $this->stripBasic('td', $match);
        };

        // Replace [td=CLASS]...[/td] with <td class="CLASS">...</td>
        $this->matches["/\[td=(.*?)\](.*?)\[\/td\]/is"] = function ($match) {
            return '<td class="' . $match[1] . '">' . $match[2] . '</td>';
        };
    }

    protected function dice()
    {
        // Replace [dice] with dice image
        $this->matches["/\[dice]/is"] = function () {
            return $this->html->image('img/dice_white.png', null, ['style' => 'width: 14px;']);
        };
    }

    protected function bigSmile()
    {
        // Make the :D smiley
        $this->matches["/\:D/is"] = function () {
            return $this->html->image('img/smileys/Big-Grin.png', null, ['style' => 'width: 18px;']);
        };
    }

    protected function toungeSmile()
    {
        // Make the :P smiley
        $this->matches["/\:P/is"] = function () {
            return $this->html->image('img/smileys/Tongue.png', null, ['style' => 'width: 18px;']);
        };
        $this->matches["/\:p/is"] = function () {
            return $this->html->image('img/smileys/Tongue.png', null, ['style' => 'width: 18px;']);
        };
    }

    protected function smile()
    {
        // Make the :) smiley
        $this->matches["/\:\)/is"] = function () {
            return $this->html->image('img/smileys/smile.png', null, ['style' => 'width: 18px;']);
        };
    }

    protected function frown()
    {
        // Make the :( smiley
        $this->matches["/\:\(/is"] = function () {
            return $this->html->image('img/smileys/Sad.png', null, ['style' => 'width: 18px;']);
        };
    }

    protected function cry()
    {
        // Make the :'( smiley
        $this->matches["/:'\(/is"] = function () {
            return $this->html->image('img/smileys/Crying2.png', null, ['style' => 'width: 18px;']);
        };
    }

    protected function wink()
    {
        // Make the ;) smiley
        $this->matches["/\;\)/is"] = function () {
            return $this->html->image('img/smileys/Winking.png', null, ['style' => 'width: 18px;']);
        };
    }

    protected function heart()
    {
        // Make the <3 smiley
        $this->matches["/<3/is"] = function () {
            return $this->html->image('img/smileys/Heart.png', null, ['style' => 'width: 18px;']);
        };
    }

    protected function paragraph()
    {
        // Replace [paragraph] with <dd>
        $this->matches["/\[paragraph\](.*?)\[\/paragraph\]/is"] = function ($match) {
            $data = preg_replace_callback("/\n\r?/", function () {
                return '';
            }, $match[1]
            );

            return '<p style="text-indent: 20px;">' . $data . '</p>';
        };
    }

    protected function textPlacement()
    {
        // Replace [super]...[super] with <span style="vertical-align: super;">...</span>
        $this->matches["/\[super\](.*?)\[\/super\]/is"] = function ($match) {
            $data = preg_replace_callback("/\n\r?/", function () {
                return '';
            }, $match[1]
            );

            return '<span style="vertical-align: super;"><small>' . $data . '</small></span>';
        };

        // Replace [sub]...[sub] with <span style="vertical-align: sub;">...</span>
        $this->matches["/\[sub\](.*?)\[\/sub\]/is"] = function ($match) {
            $data = preg_replace_callback("/\n\r?/", function () {
                return '';
            }, $match[1]
            );

            return '<span style="vertical-align: sub;"><small>' . $data . '</small></span>';
        };
    }

    protected function small()
    {
        // Replace [small]...[small] with <small>...</small>
        $this->matches["/\[small\](.*?)\[\/small\]/is"] = function ($match) {
            return $this->stripBasic('small', $match);
        };
    }

    protected function spoiler()
    {
        // Replace [spoiler=TITLE]...[/spoiler] with Bootstrap toggles
        $this->matches["/\[spoiler=(.*?)\](.*?)\[\/spoiler\]/is"] = function ($match) {
            return '<div class="well well-sm"><div data-toggle="collapse" data-target="#spoiler_' . time() . '" class="text-info" onClick="$(this).children().children().toggleClass(\'fa fa-chevron-down\').toggleClass(\'fa fa-chevron-up\');"><strong>' . $match[1] . ' <i class="fa fa-chevron-down pull-right"></i></strong></div><div id="spoiler_' . time() . '" class="collapse">' . $match[2] . '</div></div>';
        };
    }

    protected function code()
    {
        // Replace [code]...[/code] with <pre><code>...</code></pre>
        $this->matches["/\[code\](.*?)\[\/code\]/is"] = function ($match) {
            return $this->html->code($match[1]);
        };
    }

    protected function quote()
    {
        // Replace [quote]...[/quote] with <blockquote><p>...</p></blockquote>
        $this->matches["/\[quote\](.*?)\[\/quote\]/is"] = function ($match) {
            return $this->html->quote($match[1]);
        };

        // Replace [quote="person"]...[/quote] with <blockquote><p>...</p></blockquote>
        $this->matches["/\[quote=\"([^\"]+)\"\](.*?)\[\/quote\]/is"] = function ($match) {
            return $match[1] . ' wrote: ' . $this->html->quote($match[2]);
        };
    }

    protected function size()
    {
        // Replace [size=30]...[/size] with <span style="font-size:30%">...</span>
        $this->matches["/\[size=(\d+)\](.*?)\[\/size\]/is"] = function ($match) {
            return $this->html->span($match[2], ['style' => 'font-size:' . $match[1] . '%']);
        };
    }

    protected function textDecoration()
    {
        // Replace [b]...[/b] with <strong>...</strong>
        $this->matches["/\[b\](.*?)\[\/b\]/is"] = function ($match) {
            return $this->html->strong($match[1]);
        };

        // Replace [i]...[/i] with <em>...</em>
        $this->matches["/\[i\](.*?)\[\/i\]/is"] = function ($match) {
            return $this->html->em($match[1]);
        };

        // Replace [s] with <del>
        $this->matches["/\[s\](.*?)\[\/s\]/is"] = function ($match) {
            return $this->html->del($match[1]);
        };

        // Replace [u]...[/u] with <span style="text-decoration:underline;">...</span>
        $this->matches["/\[u\](.*?)\[\/u\]/is"] = function ($match) {
            return $this->html->span($match[1], ['style' => 'text-decoration:underline']);
        };
    }

    protected function center()
    {
        // Replace [center]...[/center] with <div style="text-align:center;">...</div>
        $this->matches["/\[center\](.*?)\[\/center\]/is"] = function ($match) {
            return $this->html->span($match[1], ['style' => 'display:block;text-align:center;']);
        };
    }

    protected function color()
    {
        // Replace [color=somecolor]...[/color] with <span style="color:somecolor">...</span>
        $this->matches["/\[color=([#a-z0-9]+)\](.*?)\[\/color\]/is"] = function ($match) {
            return $this->html->span($match[2], ['style' => 'color:' . $match[1]]);
        };
    }

    protected function spanClass()
    {
        // Replace [spanClass=someclass]...[/spanClass] with <span class="someclass">...</span>
        $this->matches["/\[spanClass=([#a-z0-9-]+)\](.*?)\[\/spanClass\]/is"] = function ($match) {
            return $this->html->span($match[2], ['class' => $match[1]]);
        };
    }

    protected function icon()
    {
        // Replace [icon=ICON] with <i class="fa fa-ICON"></i>
        $this->matches["/\[icon=(.*?)\]/is"] = function ($match) {
            return '<i class="fa fa-' . $match[1] . '" style="padding: 0px 5px;font-size: 14px;"></i>';
        };
    }

    protected function fullWidth()
    {
        // Replace [fullWidth]...[/fullWidth] with <div style="width: 100%;">...</div>
        $this->matches["/\[fullWidth\](.*?)\[\/fullWidth\]/is"] = function ($match) {
            return '<div style="width: 100%;">' . $match[1] . '</div>';
        };
    }

    protected function float()
    {
        // Replace [floatRight]...[/floatRight] with <div style="float: right;">...</div>
        $this->matches["/\[floatRight\](.*?)\[\/floatRight\]/is"] = function ($match) {
            return '<div style="float: right;">' . $match[1] . '</div>';
        };
    }

    protected function email()
    {
        // Replace [email]...[/email] with <a href="mailto:...">...</a>
        $this->matches["/\[email\](.*?)\[\/email\]/is"] = function ($match) {
            return $this->html->mailto($match[1], $match[1]);
        };

        // Replace [email=someone@somewhere.com]An e-mail link[/email] with <a href="mailto:someone@somewhere.com">An e-mail link</a>
        $this->matches["/\[email=(.*?)\](.*?)\[\/email\]/is"] = function ($match) {
            return $this->html->mailto($match[1], $match[2]);
        };
    }

    protected function url()
    {
        // Replace [url]...[/url] with <a href="...">...</a>
        $this->matches["/\[url\](.*?)\[\/url\]/is"] = function ($match) {
            return $this->html->link($match[1], $match[1]);
        };

        // Replace "[url=http://domain/]A link[/url]" with "<a href="http://omain/">A link</a>"
        $this->matches["/\[url=(.*?)\](.*?)\[\/url\]/is"] = function ($match) {
            return $this->html->link($match[1], $match[2]);
        };
    }

    protected function image()
    {
        // Replace [img]...[/img] with <img src="..."/>
        $this->matches["/\[img\](.*?)\[\/img\]/is"] = function ($match) {
            return $this->html->image($match[1]);
        };

        // Replace [img=SIZE]...[/img] with <img style="width: SIZE%;" src="..."/>
        $this->matches["/\[img=(.*?)\](.*?)\[\/img\]/is"] = function ($match) {
            return $this->html->image($match[2], null, ['style' => 'width: ' . $match[1] . '%;']);
        };
    }

    protected function lists()
    {
        // Replace [list]...[/list] with <ul><li>...</li></ul>
        $this->matches["/\[list\](.*?)\[\/list\]/is"] = function ($match) {
            preg_match_all("/\[\*\]([^\[\*\]]*)/is", $match[1], $items);

            return $this->html->ul(preg_replace("/[\n\r?]$/", null, $items[1]));
        };

        // Replace [list=1|a]...[/list] with <ul|ol><li>...</li></ul|ol>
        $this->matches["/\[list=(1|a)\](.*?)\[\/list\]/is"] = function ($match) {
            $attr = [];

            if ($match[1] === 'a') {
                $attr = ['style' => 'list-style-type: lower-alpha'];
            }

            preg_match_all("/\[\*\]([^\[\*\]]*)/is", $match[2], $items);

            return $this->html->ol(preg_replace("/[\n\r?]$/", null, $items[1]), $attr);
        };
    }

    protected function youtube()
    {
        // Replace [youtube]...[/youtube] with <iframe src="..."></iframe>
        $this->matches["/\[youtube\](?:http?:\/\/)?(?:www\.)?youtu(?:\.be\/|be\.com\/watch\?v=)([A-Z0-9\-_]+)(?:&(.*?))?\[\/youtube\]/i"] = function ($match) {
            return $this->html->iframe('http://www.youtube.com/embed/' . $match[1], [
                    'class'       => 'youtube-player',
                    'type'        => 'text/html',
                    'width'       => 640,
                    'height'      => 385,
                    'frameborder' => 0
                ]
            );
        };
    }
}
