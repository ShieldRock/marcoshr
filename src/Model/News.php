<?php

namespace App\Model;

class News {
    /** INI PROPERTIES */
    // Index value for the news
    private $index;
    // The title of the news
    private $title;
    // The preview image of the news
    private $previewImage;
    // The preview text of the news
    private $previewText;
    // The URL for the full news
    private $url;
    /** END PROPERTIES */

    /** INI CONTRUCTORS */
    function __construct($pTitle, $pPreviewImage, $pPreviewText, $pUrl) {
        $this->title = $pTitle;
        $this->previewImage = $pPreviewImage;
        $this->previewText = $pPreviewText;
        $this->url = $pUrl;
    }
    /** END CONTRUCTORS */

    /** INI GETTERS & SETTERS */
    // Get the index
    public function getIndex(){
        return $this->index;
    }
    // Set the index
    public function setIndex($pIndex){
        $this->index = $pIndex;
    }
    // Get the title
    public function getTitle(){
        return $this->title;
    }
    // Set the title
    public function setTitle($pTitle){
        $this->title = $pTitle;
    }
    // Get the preview image
    public function getPreviewImage(){
        return $this->previewImage;
    }
    // Set the preview image
    public function setPreviewImage($pPreviewImage){
        $this->previewImage = $pPreviewImage;
    }
    // Get the preview text
    public function getPreviewText(){
        return $this->previewText;
    }
    // Set the preview text
    public function setPreviewText($pPreviewText){
        $this->previewText = $pPreviewText;
    }
    // Get the URL
    public function getUrl(){
        return $this->url;
    }
    // Set the URL
    public function setUrl($pUrl){
        $this->url = $pUrl;
    }
    /** END GETTERS & SETTERS */
}
