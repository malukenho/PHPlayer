<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

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
