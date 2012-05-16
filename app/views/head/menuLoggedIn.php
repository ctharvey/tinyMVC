        <div id="loggedin_info">
            <a style="color: white;" href="http://<?=SERVER?>.com/users.php"><?=$username?></a>
            <a style="color: white;" id="logoutlink" href="http://<?=SERVER?>.com/?logout=true&redirect=<?echo $pageURL?>">(logout)</a>
            <span style="margin-left: 10px; color:green;">$</span><?=users::formatMoney($money)?>
            <span style="margin-left: 10px; font-weight: bold">
                Position: <?=users::formatRank($high_position)?>
            </span>
            <span style="margin-left: 10px; font-weight: bold">
                Rank:
                <a href="#" onClick="return false" onMouseOver="fadeIn('#rankdropdown')" onMouseOut="fadeOut('#rankdropdown')">
                    <?=users::formatRank($high_rank);?> 
                </a>
            </span>
            <div id="rankdropdown">
                <table>
                    <tr>
                        <td>VP:</td>
                        <td class="text_shadow" style="color:gold;"><?=$vptotal?></td>
                        <td>X 1</td>
                        <td class="text_shadow" style="color:gold;"><?=$vptotal?></td>
                    </tr>
                    <tr>
                        <td>Posts: </td>
                        <td class="text_shadow" style="color: #DD6600;"><?=$total_posts?></td>
                        <td> &#247; 10</td>
                        <td class="text_shadow" style="color: #DD6600;"><?=$total_posts/10?></td>

                    </tr>
                    <tr>
                        <td>Time: </td>
                        <td class="text_shadow" style="color:red;"><?=round($total_time/3600, 2)?> hours</td>
                        <td> X 1</td>
                        <td class="text_shadow" style="color:red;"><?echo round($total_time/3600, 2)?></td>
                    </tr>
                    <?if(!empty($bonus)){foreach ($bonus as $entry){?>
                    <tr>
                        <td>Bonus:</td>
                        <td class="text_shadow" style="color: #FF00FF;"><?=$entry[0]?></td>
                        <td> = </td>
                        <td class="text_shadow" style="color: #FF00FF;"><?=$entry[1]?> Points</td>
                    </tr>
                    <?}}?>
                </table>
            <hr />
                <table>
                <tr>
                    <td colspan="2">Total:</td>
                    <td style="padding-left: 100px; color: green;"><?=$totalPoints?></td>
                </tr>
            </table>
        </div>
    </div>
            