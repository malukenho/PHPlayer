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

* Type 'help' and press return to see all commands or type 'genres' to explore:

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
        } elseif ($genre = preg_match('/play (\w+)/', $userInput)) {
            $this->playMusic();
        } 
    
        $this->doExecute();
    }

    public function genresList()
    {
         return <<< EOS

Rock

---
Use 'Play Rock' for listen to rock songs
EOS;
    }

    protected function playMusic()
    {
        `osascript -e 'tell application "iTunes"
          open location "https://api.soundcloud.com/tracks/117128668/stream?client_id=26fb3c513c8e0e2c18a75e6174f4ca70"
          play
          set visible of every window to false
        end tell'`;

        $this->out('<info>Playing track.</info>');
    }
}