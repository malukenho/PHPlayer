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

namespace PHPlayer;

use Joomla\Application;

class Player extends Application\AbstractCliApplication
{
    /**
     * @var string
     */
    private $genre;

    /**
     * @var integer contains the music time
     */
    private $musicTime;

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
                $this->genre = $genre[1];
                $this->playMusic($genre[1]);
            } else {
                $this->out('<info>• I\'m sorry Dave, genre not found. </info>');
            }
        } elseif ('next' == $userInput) {
            $this->playMusic($this->genre);
        } elseif ('clear' == $userInput) {
            `clear`;
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

        $time = `osascript -e 'tell application "iTunes" to time of current track as string'`;
        $duration = `osascript -e 'tell application "iTunes" to duration of current track as string'`;
        $position = `osascript -e 'tell application "iTunes" to player position as string'`;
        $this->out($position);
        $this->out($time);
        $this->out('<info>Playing track.</info>');
    }
}
