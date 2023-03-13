<style>
    html, body {
      margin: 0;
      color: #111920;
      font-family: ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji";
    }
    code {
      background-color: #FFB607;
      padding: 2px 3px;
      border-radius: 5px;
    }
  </style>

  <div style="display: flex; justify-content: center; width: 100vw; height: 100vh; background-image: url(https://nextgen.aptible.com/background-pattern-v2.png);">
    <div style="max-width: 640px; padding-top: 20px;">
      <div style=" border: 1px solid #E7E8E8; padding: 0 20px; background-color: #fff; border-radius: 6px; box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.06);">
        <h1>Congrats on deploying to Aptible!</h1>

        <p>This is a template that you can modify or remove.</p>
@if (!empty($db_message))
        <p>A database has not been successfully connected to this app. This is done by <a href="https://deploy-docs.aptible.com/docs/cli-config-set" target="_blank">setting configuration variables</a> for the app:</p>
        <ul>
          <li><code>DB_CONNECTION=aptible</code></li>
          <li><code>DATABASE_URL</code> (this is the database url shown in the database page in the Aptible dashboard under "reveal credentials")</li>
        </ul>
        <p>The error message currently returned is: {{ $db_message }}</p>
@else
        <p>You have successfully connected a database to this app!</p>
@endif
      </div>
    </div>
  </div>
