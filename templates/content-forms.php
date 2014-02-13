<h2>Default Form</h2>

<form class="form">
  <fieldset>
    <legend>A compact inline form</legend>

    <input type="email" placeholder="Email" class="text-input">
    <input type="password" placeholder="Password" class="text-input">

    <label for="remember">
      <input id="remember" type="checkbox"> Remember me
    </label>

    <button type="submit" class="btn btn--small btn--positive">Sign in</button>
  </fieldset>
</form>

<h2>Stacked Form</h2>

  <form class="form form--stacked">
    <fieldset>
      <legend>A Stacked Form</legend>

      <label for="email">Email</label>
      <input id="email" type="email" placeholder="Email" class="text-input">

      <label for="password">Password</label>
      <input id="password" type="password" placeholder="Password" class="text-input">

      <label for="state">State</label>
      <select id="state">
        <option>AL</option>
        <option>CA</option>
        <option>IL</option>
      </select>

      <label for="remember" class="checkbox">
        <input id="remember" type="checkbox"> Remember me
      </label>

      <button type="submit" class="btn btn--small btn--positive">Sign in</button>
    </fieldset>
  </form>

<h2>Aligned Form</h2>

  <form class="form form--aligned">
    <fieldset>
      <div class="form__control-group">
        <label for="name">Username</label>
        <input id="name" type="text" placeholder="Username" class="text-input">
      </div>

      <div class="form__control-group">
        <label for="password">Password</label>
        <input id="password" type="password" placeholder="Password" class="text-input">
      </div>

      <div class="form__control-group">
        <label for="email">Email Address</label>
        <input id="email" type="email" placeholder="Email Address" class="text-input">
      </div>

      <div class="form__control-group">
        <label for="foo">Supercalifragilistic Label</label>
        <input id="foo" type="text" placeholder="Enter something here..." class="text-input">
      </div>

      <div class="form__controls">
        <label for="cb" class="checkbox">
          <input id="cb" type="checkbox"> I've read the terms and conditions
        </label>

        <button type="submit" class="btn btn--small btn--positive">Submit</button>
      </div>
    </fieldset>
  </form>

<h2>Multi-Column Form (with grids)</h2>

  <form class="form form--stacked">
    <fieldset>
      <legend>Legend</legend>

      <div class="grid">
        <div class="one-third  grid__item">
          <label for="first-name">First Name</label>
          <input id="first-name" type="text" class="text-input">
        </div><!--
        --><div class="one-third  grid__item">
          <label for="last-name">Last Name</label>
          <input id="last-name" type="text" class="text-input">
        </div><!--
        --><div class="one-third  grid__item">
          <label for="email">E-Mail</label>
          <input id="email" type="email" required class="text-input">
        </div><!--
        --><div class="one-third  grid__item">
          <label for="city">City</label>
          <input id="city" type="text" class="text-input">
        </div><!--
        --><div class="one-third  grid__item">
          <label for="state">State</label>
          <select id="state" class="one-half">
            <option>AL</option>
            <option>CA</option>
            <option>IL</option>
          </select>
        </div>
      </div>

      <label for="terms" class="checkbox">
        <input id="terms" type="checkbox"> I've read the terms and conditions
      </label>

      <button type="submit" class="btn btn--small btn--positive">Submit</button>
    </fieldset>
  </form>

<h2>Grouped Inputs</h2>

  <form class="form">
    <fieldset class="form__group">
      <input type="text" class="one-half  text-input" placeholder="Username">
      <input type="text" class="one-half  text-input" placeholder="Password">
      <input type="email" class="one-half  text-input" placeholder="Email">
    </fieldset>

    <fieldset class="form__group">
      <input type="text" class="one-half  text-input" placeholder="Another Group">
      <input type="text" class="one-half  text-input" placeholder="More Stuff">
    </fieldset>

    <button type="submit" class="btn btn--small one-half btn--positive">Sign in</button>
  </form>

<h2>Input Sizing</h2>

  <form class="form">
    <input class="one-whole  text-input" type="text" placeholder=".one-whole"><br><!--
    --><input class="two-thirds  text-input" type="text" placeholder=".two-thirds"><br><!--
    --><input class="one-half  text-input" type="text" placeholder=".one-half"><br><!--
    --><input class="one-third  text-input" type="text" placeholder=".one-third"><br><!--
    --><input class="one-fourth  text-input" type="text" placeholder=".one-fourth"><br>
   </form>

  <br />

   <form class="form  grid  grid--full">
    <div class="one-quarter  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".one-fourth">
    </div><!--
    --><div class="three-quarters  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".three-quarters">
    </div><!--
    --><div class="one-half  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".one-half">
    </div><!--
    --><div class="one-half  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".one-half">
    </div><!--
    --><div class="one-eighth  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".one-eighth">
    </div><!--
    --><div class="one-eighth  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".one-eighth">
    </div><!--
    --><div class="one-quarter  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".one-fourth">
    </div><!--
    --><div class="one-half  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".one-half">
    </div><!--
    --><div class="one-fifth  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".one-fifth">
    </div><!--
    --><div class="two-fifths  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".two-fifths">
    </div><!--
    --><div class="two-fifths  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".two-fifths">
    </div><!--
    --><div class="one-whole  grid__item">
      <input class="one-whole  text-input" type="text" placeholder=".one-whole">
    </div>
  </form>

<h2>Required Inputs</h2>

  <form class="form">
    <input type="email" placeholder="Requires an email" required class="text-input">
  </form>

<h2>Disabled Inputs</h2>

  <form class="form">
    <input type="text" placeholder="Disabled input here..." disabled class="text-input">
  </form>

<h2>Read-Only Inputs</h2>

  <form class="form">
    <input type="text" value="Readonly input here..." readonly class="text-input">
  </form>

<h2>Rounded Inputs</h2>

  <form class="form">
    <input type="text" class="text-input  text-input--rounded  text-input">
    <button type="submit" class="btn btn--small">Search</button>
  </form>

<h2>Checkboxes and Radios</h2>

  <form class="form">
    <label for="option-one" class="checkbox">
      <input id="option-one" type="checkbox" value="">
      Here's option one.
    </label>

    <label for="option-two" class="radio">
      <input id="option-two" type="radio" name="optionsRadios" value="option1" checked>
      Here's a radio button. You can choose this one..
    </label>

    <label for="option-three" class="radio">
      <input id="option-three" type="radio" name="optionsRadios" value="option2">
      ..Or this one!
    </label>
  </form>
