<?php

namespace ReesMcIvor\ClockIn\Http\Controllers;

use App\Http\Controllers\Controller;
use ReesMcIvor\ClockIn\Models\Reader;
use ReesMcIvor\ClockIn\Models\Card;
use ReesMcIvor\ClockIn\Models\CardRead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResponseFromReaderController extends Controller
{
    public function __invoke(Request $request)
    {

        $reader = Reader::updateOrCreate(
            ['mac_address' => $request->get('mac')],
            $request->all()
        );

        if($request->get('cmd') == 'CO') {

            $card = Card::updateOrCreate(
                ['uid' => $request->get('uid')],
                $request->all()
            );

            CardRead::create([
                'reader_id' => $reader->id,
                'card_id' => $card->id,
            ]);

            $card?->user?->toggleClockedIn()->save();

        }


        Log::debug($request->all());
        echo "<html><body>";
        $mycard = "0485624A215980";
        $st = date('Y-m-d H:i:s', time());
        $cmd = $_GET["cmd"];
        echo "<ORBIT>";
        switch ($cmd) {
            case"PU":
                echo "CK=$st\n";
                echo "DHCP=1\n";
                echo "MKEY=BA637F128CCDC\r\n";
                echo "MREAD=B04\r\n";
                echo "MAUTH=1\r\n";
                echo "MD5=53306C757421306E\n";
                echo "SID=ABBA0123\n";
                //echo"WS=139.162.243.42\n";
                echo "WS=\n";
                echo "WN=clockin.staging.logicrises.co.uk\n";
                echo "EXT=0\t";
                echo "HB=10\t";
                echo "RLY=1\t";
                break;
            case"CO":
                $uid = $_GET["uid"];
                if ($card?->user) {
                    Log::debug("Card read: $uid");
                    echo "BEEP=1\t";
                    echo "LED3=2000\t";
                    echo "GRNT=05\t";
                } else {
                    echo "BEEP=0\t";
                    echo "LED1=2000\t";
                    echo "DENY\t";
                }
                break;
            case"HB":
                echo "CK=$st";
                break;
            case"PG":
                break;
            case"SW":
                break;
        }
        echo "</ORBIT>";
        echo "</body></html>";
    }
}
