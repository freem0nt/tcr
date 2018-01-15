<form name="form" action="../FormToEmail.php" method="post">
    <fieldset>
        <legend style="margin-left:10px;padding: 0 5px;color: inherit;">Email me:</legend>
        <p><label for="name">Name:<input style="float:right;" type="text" name="name" id="name" value="" size="25"
                                         maxlength="50"></label></p>
        <p><label for="email">Email:<input style="float:right;" type="text" name="email" id="email" value="" size="25"
                                           maxlength="50"></label></p>
        <p><label for="subject">Subject:<input style="float:right;" type="text" name="subject" id="subject" value=""
                                               size="25" maxlength="50"></label></p>
        <p><label for="comments">Message:<br>
                <textarea name="comments" id="comments" rows="3" cols="10"
                          style="width:100%;max-width:50em;"></textarea></label></p>
        <p><input class="btn" type="submit" value="Send email !">
            <input style="float:right;" class="btn" type="reset" value="Clear"></p>
    </fieldset>
</form>
		