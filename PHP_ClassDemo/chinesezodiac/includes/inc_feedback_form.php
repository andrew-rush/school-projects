<form id="form1" name="feedback" method="post" action="index.php?page=feedback">
  <p>
    <label for="sender">Your Name</label><br />
    <input type="text" name="sender" id="sender" />
  </p>
  <p>
    <label for="msg">Your Feedback</label><br />
    <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
  </p>
  <p>
    <label for="publicMsg">Display Comments?</label><br />
    <label><select name="publicMsg" id="publicMsg">
      <option value="Y">Yes</option>
      <option value="N">No</option>
    </select></label>
  </p>
  <p>
  	<input type="submit" name="submit" id="submit" value="Submit" />
  </p>
</form>