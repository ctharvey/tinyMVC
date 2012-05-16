        <div id="dynmenu">
            <ul>
                <li>
                    <a href="http://<?=SERVER?>.com/index.php">Home</a>
                </li>
                <li>
                    <a href="http://<?=SERVER?>.com/vote/">Vote!</a>
                </li>
                <li><a href="#" onclick="return false;">Donate</a>
                    <ul style="margin-left: -11px;">
                        <li><a class="first" href="http://<?=SERVER?>.com/donate/monthly.php">Monthly</a></li>
                        <li><a href="http://<?=SERVER?>.com/donate/lifetime.php">Lifetime</a></li>
                        <li><a href="http://<?=SERVER?>.com/donate/wg.php">WG/Town</a></li>
                    </ul>
                </li>
                <li>
                    <a href="http://<?=SERVER?>.com/md_tests">Tests</a>
                </li>
                <li>
                    <a href="http://<?=SERVER?>.com/forums/">Forums</a>
                </li>
                <li>
                    <a href="http://<?=SERVER?>.com/appeals">Appeals</a>
                </li>
                <li>
                    <a target="_blank" href="http://<?=SERVER?>.com/wiki/">Wiki</a>
                </li>
                <li><a href="http://<?=SERVER?>.com/map/">Map</a></li>
                <li>
                    <a href="#" onClick="return false">Chat</a>
                    <ul style="margin-left: -35px;"><?if ($user->data['username'] != "Anonymous"){?>
                        <li>
                            <a class="first" href="http://<?=SERVER?>.com/viewchat.php">In-Game Chat</a>
                        </li>
                        <?}?>
                        <li><a href="http://<?=SERVER?>.com/chat.php?server=Minederp#chat">IRC</a></li>
                    </ul>
                </li>
                <li>
                    <a href="http://<?=SERVER?>.com/players.php">Players</a>
                </li> 
                <?if (users::allowThisRankAndAbove('Mod', $high_position)){?>
                <li>
                    <a href="http://<?=SERVER?>.com/admin/" onClick="">Admin</a>
                </li>
                <?}if ($user->data['username'] == "Anonymous" || $username == "Anonymous"){?>
                <li>
                    <a href="http://<?=SERVER?>.com/register.php" id="registerlink"> Register</a>
                </li>
                <?}?>
            </ul>
        </div>
<div style="clear: both"></div>