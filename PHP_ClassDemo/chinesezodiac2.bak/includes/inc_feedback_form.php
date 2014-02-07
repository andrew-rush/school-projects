<form id="form1" name="feedback" method="post" action="process_feedback.php">
  <p>
    <label for="sender">Your Name</label>
    <input type="text" name="sender" id="sender" />
  </p>
  <p>
    <label for="msg">Your Feedback</label>
    <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
  </p>
  <p>
    <label for="publicMsg">Display Comments?</label>
    <label><select name="publicMsg" id="publicMsg">
      <option value="Y">Yes</option>
      <option value="N">No</option>
    </select></label>
  </p>
  <p>
  	<input type="submit" name="submit" id="submit" value="Submit" />
  </p>
</form>