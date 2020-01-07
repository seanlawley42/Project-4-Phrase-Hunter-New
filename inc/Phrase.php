<?php

require 'inc/wordbank.php';

class Phrase{
    /*Class file includes the $currentPhrase and $selected properties.
    
    The Star Trek character our player is guessing:*/
    public $currentPhrase;
    //An array of letters our player has already selected:
    public $selected = [];
    
    /*Class file includes a constructor which accepts two optional parameters 
    for a phrase string and a selected array.*/
    public function __construct($phrase = null, $selected=null){
        //If a phrase is not passed, a phrase is randomly selected from a list.
        if (!empty($phrase)) {
            $this->currentPhrase = $phrase;
        }
        if(!isset($phrase)){
            $this->currentPhrase=wordBankRandomizer();
        }
        if (!empty($selected)){
            $this->selected = $selected;
        }
        
    }

    public function getPhrase(){
        return $this->currentPhrase;
    }

    public function getSelected(){
        return $this->selected;
    }

    public function getLetterArray(){
        return array_unique(str_split(str_replace(" ", "", strtolower($this->currentPhrase))));
    }

    public function getLost(){
        return count(array_diff($this->selected, $this->getLetterArray()));
    }

    public function addPhraseToDisplay(){
        /*Builds the HTML for the letters of the phrase.
        Each letter is presented by an empty box, one list item for each letter.*/
         
        $phraseToDisplay = "<div class='section' id='phrase'><ul>";
        $characters = str_split(strtolower($this->currentPhrase));
        
        /*When the player correctly guesses a letter, the empty box is replaced with the matched letter. 
        Use the class "hide" to hide a letter and "show" to show a letter.*/
        foreach ($characters as $character){
            if(in_array($character , $this->selected)){
                $phraseToDisplay.= '<li class="show letter">' . $character . "</li>";
            }
            elseif ($character == ' '){
                $phraseToDisplay.= '<li class="space">'." "."</li>";
            }
            else{
                $phraseToDisplay.= '<li class="hide letter">' . $character . "</li>";
            }
        }
        $phraseToDisplay.= "</ul></div>";
        return $phraseToDisplay;
    }

    public function checkLetter($letter){
        /*Checks to see if a letter matches a letter in the phrase. 
        Accepts a single letter to check against the phrase. 
        Returns true or false.*/
        if (in_array($letter, $this->getLetterArray())){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

}