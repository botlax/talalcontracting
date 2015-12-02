<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width"/>
  <style>
  </style>
  <style>

    table.facebook td {
      background: #3b5998;
      border-color: #2d4473;
    }

    table.facebook:hover td {
      background: #2d4473 !important;
    }

    table.twitter td {
      background: #00acee;
      border-color: #0087bb;
    }

    table.twitter:hover td {
      background: #0087bb !important;
    }

    table.google-plus td {
      background-color: #DB4A39;
      border-color: #CC0000;
    }

    table.google-plus:hover td {
      background: #CC0000 !important;
    }

    .template-label {
      color: #ffffff;
      font-weight: bold;
      font-size: 11px;
    }

    .callout .wrapper {
      padding-bottom: 20px;
    }

    .callout .panel {
      background: #ECF8FF;
      border-color: #b9e5ff;
    }

    .header {
      background: #999999;
    }

    .footer .wrapper {
      background: #ebebeb;
    }

    p span{
      font-weight: bold;
      float: left;
      margin-bottom: 1em;
      width: 5em;
    }

    p#message span{
        margin-bottom: 10em;
    }

    .footer h5 {
      padding-bottom: 10px;
    }

    table.columns .text-pad {
      padding-left: 10px;
      padding-right: 10px;
    }

    table.columns .left-text-pad {
      padding-left: 10px;
    }

    table.columns .right-text-pad {
      padding-right: 10px;
    }

    @media only screen and (max-width: 600px) {

      table[class="body"] .right-text-pad {
        padding-left: 10px !important;
      }

      table[class="body"] .left-text-pad {
        padding-right: 10px !important;
      }
    }

  </style>
</head>
<body>
  <table class="body">
    <tr>
      <td class="center" align="center" valign="top">
        <center>

          <table class="container">
            <tr>
              <td>

                <table class="row">
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tr>
                          <td>
                            <p><span>Name:</span> {{$name}}</p>
                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tr>
                          <td>
                            <p><span>Email:</span> {{$email}}</p>
                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tr>
                          <td>
                            <p><span>Subject:</span> {{$subject}}</p>
                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tr>
                          <td>
                            <p id="message"><span>Message:</span> {{$body}}</p>
                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                </table>

              <!-- container end below -->
              </td>
            </tr>
          </table>

        </center>
      </td>
    </tr>
  </table>
</body>
</html>