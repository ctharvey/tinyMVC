        <div>
            <form style="margin-left: 7px; float:left;" method="post">
                Login:
                    <input class="login roundcorners" type="text" value="<?echo $_SESSION['mduserid']?>" name="username" />
                Password:
                    <input type="hidden" name="action" value="login" />
                    <input type="hidden" name="redirect" value="<?echo $pageURL?>" />
                    <input class="login roundcorners" type="password" name="password" />
                <label for="remember">Remember?</label>
                    <input class="round corners" type="checkbox" name="remember" />
                <input style="margin-left: -1px;" class="submit roundcorners" type="submit" name="submit" value="Submit" />
            </form>
        </div>