<form name="smsform" action="../smsprocessor.php" method="post">
    <fieldset>
        <legend style="margin-left:10px;padding: 0 5px;color: inherit;">Send a text:</legend>
        <p><label for="smsname">Name:<input style="float:right;" type="text" name="smsname" id="smsname" value=""
                                            size="25" maxlength="50"></label></p>
        <!--<p><label for="smsemail">Email:<input style="float:right;" type="text" name="smsemail" id="smsemail" value="" size="25" maxlength="50"></label></p>-->
        <p><label for="smsnumber">Number: <span style="font-size:x-small;letter-spacing:.25em;">(No dashes)</span><input
                        style="float:right;" type="text" name="smsnumber" id="smsnumber" value="" size="10"
                        maxlength="10"></label></p>
        <p><label for="smsmessage">Text:<br><textarea name="smsmessage" id="smsmessage" rows="3" cols="10"
                                                      style="width:100%;max-width:50em;"></textarea></label></p>
        <p><input class="btn" type="submit" value="Send text !"><input style="float:right;" class="btn" type="reset"
                                                                       value="Clear"></p>
    </fieldset>
</form>
