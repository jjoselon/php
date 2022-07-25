<?php

/**
 * This file is a part of Zest Framework.
 *
 * @author   Malik Umer Farooq <lablnet01@gmail.com>
 * @author-profile https://www.facebook.com/malikumerfarooq01/
 *
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @license MIT
 */

namespace Zest\Whoops;

class Whoops
{
    /**
     * Store the errors stack.
     *
     * @since 3.0.0
     *
     * @var array
     */
    private $stack = [];

    /**
     * A list of known editor strings.
     *
     * @since 3.0.0
     *
     * @var array
     */
    private $editors = [
        'sublime'  => 'subl://open?url=file://::file&line=::line',
    ];

    /**
     * Current editor that to be use.
     *
     * @since 3.0.0
     *
     * @var string
     */
    public $setEditor = '';

    /**
     * __construct.
     *
     * @since 3.0.0
     */
    public function __construct()
    {
        error_reporting(E_ALL);
        set_exception_handler([$this, 'exception']);
        set_error_handler([$this, 'error']);
    }

    /**
     * expection handler.
     *
     * @since 3.0.0
     *
     * @return mixed
     */
    public function exception($e)
    {
        $this->setParams(
            $e->getCode(),
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $e->getTraceAsString());

        return $this->render();
    }

    /**
     * Get the editor uri.
     *
     * @param (string) $key editor name
     *
     * @since 3.0.0
     *
     * @return mixed
     */
    public function getEditor($key)
    {
        return (isset($this->editors[$key])) ? $this->editors[$key] : null;
    }

    /**
     * Get the editor uri.
     *
     * @param (string) $key editor name
     *
     * @since 3.0.0
     *
     * @return mixed
     */
    public function setEditor($key)
    {
        $this->setEditor = (isset($this->editors[$key])) ? $key : null;
    }

    /**
     * Appen the editor.
     *
     * @param (string) $key editor name
     * @param (string) $uri valid url string pattern
     *
     * @since 3.0.0
     *
     * @return void
     */
    public function appendEditor($key, $uri) :self
    {
        $arr = [$key => $uri];
        $merge = array_merge($arr, $this->editors);
        $this->editors = $merge;

        return $this;
    }

    /**
     * Error handler.
     *
     * @since 3.0.0
     *
     * @return mixed
     */
    public function error($code, $msg, $file, $line)
    {
        $this->setParams($code, $msg, $file, $line, '');

        return $this->render();
    }

    /**
     * Set the error item to stack.
     *
     * @param (int)    $code
     * @param (string) $msg
     * @param (string) $file
     * @param (int)    $line
     * @param (string) $trace
     *
     * @since 3.0.0
     *
     * @return mixed
     */
    protected function setParams($code, $msg, $file, $line, $trace)
    {
        return $this->stack = [
            'message'     => $msg,
            'file'        => $file,
            'line'        => $line,
            'code'        => ($code === 0) ? 404 : $code,
            'trace'       => $trace,
            'previewCode' => '',
            'editor'      => $this->setEditor,
            'editorUri'   => $this->getEditor($this->setEditor),
        ];
    }

    /**
     * Get the code from file.
     *
     * @since 3.0.0
     *
     * @return void
     */
    protected function getPreviewCode()
    {
        $file = file($this->stack['file']);
        $line = $this->stack['line'];
        $_line = $line - 1;
        if ($_line - 5 >= 0) {
            $start = $_line - 5;
            $end = $_line + 5;
        } else {
            $start = $_line;
            $end = $line;
        }
        for ($i = $start; $i <= $end; $i++) {
            if (!isset($file[$i])) {
                break;
            }
            $text = trim($file[$i]);
            if ($i === $_line) {
                $this->stack['previewCode'] .=
                    "<span style='background:red' class='line'>".($i + 1).'</span>'.
                    "<span style='background:red'>".$text.'</span><br>';
                continue;
            }
            $this->stack['previewCode'] .=
                "<span class='line'>".($i + 1).'</span>'.
                '<span>'.$text.'</span><br>';
        }
    }

    /**
     * Rander the error.
     *
     * @since 3.0.0
     *
     * @return mixed
     */
    public function render()
    {
        $this->getPreviewCode();
        $stack = $this->stack;
        $file = 'views/view.php';
        require $file;

        return true;
    }
}
