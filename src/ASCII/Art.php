<?php
namespace PHPlayer\ASCII;

/**
 * Description of Art
 *
 * @author Jefersson Nathan <malukenho@phpse.net>
 */
class Art
{
    private static $_introIsShowed = false;
    
    public static function intro()
    {
        if (false === self::$_introIsShowed) {
            self::$_introIsShowed = true;
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
}
