<?php
namespace PHPlayer;

use Joomla\Application;

class Player extends Application\AbstractCliApplication
{

    private static $introIsShowed = false;

    protected function intro()
    {
        if (false === self::$introIsShowed) {
            self::$introIsShowed = true;
        return <<< EOS

______ _   _ ______ _
| ___ \ | | || ___ \ |
| |_/ / |_| || |_/ / | __ _ _   _  ___ _ __
|  __/|  _  ||  __/| |/ _` | | | |/ _ \ '__|
| |   | | | || |   | | (_| | |_| |  __/ |
\_|   \_| |_/\_|   |_|\__,_|\__, |\___|_|
                             __/ |  v1.0
                            |___/

Coded by Jefersson Nathan (@malukenho)
Inspired by cmf.fm ⚒ (http://cmd.fm)

<question>  music provided by soundcloud ☁  </question>

--------------------------------------------------------------------------------

* Type <info>'help'</info> and press return to see all commands or type <info>'genres'</info> to explore:

EOS;
        }
    }

    protected function doExecute()
    {
        $this->out($this->intro());

        $this->out('> ', false);
        $userInput = $this->in();

        if ('genres' == $userInput) {
            $this->out($this->genresList());
        } elseif (preg_match('/play ([\w\s-\&]+)/', $userInput, $genre)) {

            $reflactor = new \ReflectionClass(new Genres\Allowed);

            if (false !== array_search($genre[1], $reflactor->getConstants())) {
                $this->playMusic($genre[1]);
            } else {
                $this->out('<info>• I\'m sorry Dave, genre not found. </info>');
            }
        } 

        $this->doExecute();
    }

    public function genresList()
    {
         return <<< EOS

Available genres
--------------------------------------------------------------------------------
<comment>80s                 Acid Jazz           Acoustic            
Acoustic Rock       African             Alternative         Ambient             
Americana           Arabic              Avantgarde          Bachata             
Bhangra             Blues               Blues Rock          Bossa Nova          
Chanson             Chillout            Chiptunes           Choir               
Classic Rock        Classical           Classical Guitar    Contemporary        
Country             Cumbia              Dance               Dancehall           
Death Metal         Dirty South         Disco               Dream Pop           
Drum & Bass         Dub                 Dubstep             Easy Listening      
Electro House       Electronic          Electronic Pop      Electronic Rock     
Folk                Folk Rock           Funk                Glitch              
Gospel              Grime               Grindcore           Grunge              
Hard Rock           Hardcore            Heavy Metal         Hip-Hop             
House               Indie               Indie Pop           Industrial Metal    
Instrumental Rock   J-Pop               Jazz                Jazz Funk           
Jazz Fusion         K-Pop               Latin               Latin Jazz          
Mambo               Metalcore           Middle Eastern      Minimal             
Modern Jazz         Moombahton          New Wave            Nu Jazz             
Opera               Orchestral          Piano               Pop                 
Post Hardcore       Post Rock           Progressive House   Progressive Metal   
Progressive Rock    Punk                R&B                 Rap                 
Reggae              Reggaeton           Riddim              Rock                
Rock 'n' Roll       Salsa               Samba               Shoegaze            
Singer / Songwriter Smooth Jazz         Soul                Synth Pop           
Tech House          Techno              Thrash Metal        Trance              
Trap                Trip-hop            Turntablism       </comment>  
 
--------------------------------------------------------------------------------
Use 'play' command to listen. Example: 'play chillout'
EOS;
    }

    protected function playMusic($genre)
    {
        $info = json_decode(file_get_contents('https://cmd.fm/api/tracks/search/?genre=' . $genre . '&limit=1'));
        $stream = $info[0]->stream_url;

        $this->out('Playing: ' . $info[0]->title);

        `osascript -e 'tell application "iTunes"
          open location "$stream?client_id=26fb3c513c8e0e2c18a75e6174f4ca70"
          play
          set visible of every window to false
        end tell'`;

        $this->out('<info>Playing track.</info>');
    }
}