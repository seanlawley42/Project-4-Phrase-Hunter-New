<?php
//Some of my favorite Star Trek characters.
$wordBank=[
    "Captain Jean-Luc Picard",
    "Captain James Kirk",
    "Captain Kathryn Janeway",
    "Commander Spock",
    "Commander William Riker",
    "Commander Beverly Crusher MD",
    "Commander Benjamin Sisko",
    "Lieutenant Commander Geordi La Forge",
    "Lieutenant Commander Leonard 'Bones' McCoy MD",
    "Lieutenant Commander Montgomery Scott",
    "Lieutenant Commander Data",
    "Lieutenant Commander Deanna Troi",
    "Lieutenant Uhura",
    "Lieutenant Hikaru Sulu",
    "Lieutenant Jadzia Dax",
    "Lieutenant Worf",
    "Lieutenant Julian Bashir MD",
    "Lieutenant Tom Paris",
    "Chief of Operations Miles O'Brien",
    "Ensign Pavel Checkov",
    "Odo",
    "Quark",
    "Seven of Nine",
    "Chakotay",
    "Emergency Medical Holographic Program Doctor",
    
];
//Function to pick a random character phrase.
function wordBankRandomizer(){
    global $wordBank;
    return $wordBank[rand(0,29)];
}
