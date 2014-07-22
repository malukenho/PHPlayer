<?php
namespace PHPlayer;

use Joomla\Application;

class Player extends Application\AbstractCliApplication
{
    protected function doExecute()
    {
        $this->out(ASCII\Art::intro());

        $this->out('> ', false);
        $userInput = $this->in();

        if ('genres' == $userInput) {
            $this->out((new ASCII\Art())->genresList());
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