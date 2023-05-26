const server = "sql.freedb.tech";
const port = 3306;
const db = "freedb_friendsbot";
const db_user = "freedb_tuser";
const pwd = "9eVJfm!XK7md?Zs";

/**
 * Admin Command
 */

var SCOPE = "https://www.googleapis.com/auth/chat.bot";
// The values below are copied from the JSON file downloaded upon
// service account creation.
// For SERVICE_ACCOUNT_PRIVATE_KEY, remember to include the BEGIN and END lines of the private key
var SERVICE_ACCOUNT_PRIVATE_KEY =
  "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQC2Nv9akJ0QNg71\nSgU8psZ7VsPQGgPCOc8gMjvv6eWaaXexvw1sGa6yUZcDCKFNGzskGSkLh54zlM/M\neKobekhJ9JAIRXtwtMBv1Z962vrA2HDt3opHLLXT4Bq9DtnibJu7ZUZf4pIurBrc\nmpRnlVoFz5PHn4UReXX5vKcE5nC0eUaJ7D9SBGP192kSqtQ1xVZ09erd4uJ10Umo\nJEBxpPhf3KJ/jiADno7c7J9Kh9XiWbpnq8cEP2bo33WLpyZ/p3f87iJpCxrKHxvH\noQ8xlFPDeEyb+YAWsauGPIZYrIdKEC0IuOkUxHDEcaS1wdBiOGHNnUkHdzXxl/v+\ngxa63YDJAgMBAAECggEADIij7/raku7lAIJi8dUW+gzx0zK253lKghByhwIzxPdU\nQGm/5putpJ5wIMlLLx6cZtNEO4LMowetc4cpTFKQ/mVQMwF0iEAmrIqpOa4uaW15\n9yLDqDmvGC/mJvMKkcSewbkpqhbPr14vStVnN+jSFGw+4hBa+uS79L3BT1j6j69a\nL/1pTpvbgTbWFyhgis6FwxOSSV0PWyOG4wzPNP5el14zXFUi0D3lVuM4B/MoPlEZ\nJjAdS9g+ZLd81mVG0TIYTk0rWriUeAaF2bUHkg8s3T5cz3/RoyCOJxp2EDFiET+v\n3GJ1K9MBvLzsmkAydZWtf+TzZpAb0eACCLDRaobqwQKBgQDZ25pY8zuSnj/fRaEC\npj2QSSCmHwrB6w44pLm39sr+d02pogzIrMC9J896NHU6l4ddbGoV9O3OmjIomgGF\nirLvzrVhollMcEKrW6IMV8mQFYa3EZ/5wqdEYxku9RucNOYBvGyjMxTEqOikHDxC\nooLxvLglOabiYHji+8Y5LiSrlQKBgQDWHd/LytewkmqSxhVrnaq5If1loR/dv4ZN\nShPcMkzwRPbaSHcq92wnTJekHHqhkZ3r5oOYTXiJtw9Xg1u8TUPzJYGTH/gKvS8E\nDrNMC5wIQWi43tB82QbsRH6XEV5cvHnWHLEKPP25S/6XP4Yx4N137VH8TqL86M/T\nsJLzKpLTZQKBgCc9IoO665Pw5Ng2FlX/0z7VrQe+t5VN3PXe1YSI8u76VgajpWHP\nm7d2ICyGnka7XCo7iLADuYFozHf7pSKEZM5EkO7Q6vyVi6yJiJpohWlqNyVqC0JV\nCQOMRdDrXNm5vWO6qGaMoMT7F0vXuhLWandX4mLyC1jiv2NCreVGplwxAoGAMesP\nFOT6eij4fbV+ovNELRs2h24UDs+rEPPXQ3vaoh2B64v/dF3wsgzSQal+EZLwXWIF\nhglxs7Gg+wcd6P2efN5eoh1O57oJbwm6VV1TiD0vnAIeWy0Bxy2E0dVzyW0LfpZ7\n0+Y6ROvps/tUXuaM23vRpF/08b+ZTEIbUGO5jV0CgYBw1uIb0ncccaktHa1dok/O\n13HyvGUrwtL0GgD+BuEt2/tv2OCuAf+daZ+oq52hClB9vrF3qqJCyTA1Wpwl2sdV\njGkBFvxp1+nJf/6ZLUwaVKTLLg/QGJu4H5pxcdau5lphWPCKuVvHog6Ox57EV4OX\neP5qkdat80J/cu4RqhgxzQ==\n-----END PRIVATE KEY-----\n";
var SERVICE_ACCOUNT_EMAIL =
  "botservice@friendattendance.iam.gserviceaccount.com";

// Posts a message into the given space ID via the API, using
// service account authentication.
function postMessage(spaceId, message) {
  var service = OAuth2.createService("chat")
    .setTokenUrl("https://accounts.google.com/o/oauth2/token")
    .setPrivateKey(SERVICE_ACCOUNT_PRIVATE_KEY)
    .setClientId(SERVICE_ACCOUNT_EMAIL)
    .setPropertyStore(PropertiesService.getUserProperties())
    .setScope(SCOPE);
  if (!service.hasAccess()) {
    Logger.log("Authentication error: %s", service.getLastError());
    return;
  }
  var url = "https://chat.googleapis.com/v1/" + spaceId + "/messages";
  UrlFetchApp.fetch(url, {
    method: "post",
    headers: { Authorization: "Bearer " + service.getAccessToken() },
    contentType: "application/json",
    payload: JSON.stringify(message),
  });
}

//Configure the chatbot service
function get_chatbot_service() {
  return OAuth2.createService("chat")
    .setTokenUrl("https://accounts.google.com/o/oauth2/token") // Set the endpoint URL.
    .setPrivateKey(SERVICE_ACCOUNT_PRIVATE_KEY) // Set the private key.
    .setIssuer(SERVICE_ACCOUNT_EMAIL) // Set the issuer.
    .setPropertyStore(PropertiesService.getScriptProperties()) // Set the property store where authorized tokens should be persisted.
    .setScope("https://www.googleapis.com/auth/chat.bot"); // Set the scope.
}

//Return all the spaces (DM and rooms) the bot belong to
function get_spaces() {
  var service = get_chatbot_service();
  var url = "https://chat.googleapis.com/v1/spaces";
  var response = UrlFetchApp.fetch(url, {
    headers: { Authorization: "Bearer " + service.getAccessToken() },
  });
  var rep = JSON.parse(response.getContentText());
  return rep.spaces;
}

function searchArray(arr, searchText,at) {
  const results = [];
  for (let i = 0; i < arr.length; i++) {
    const substrings = arr[i][at].split(" ");
    for (let j = 0; j < substrings.length; j++) {
      if (substrings[j] === searchText) {
        results.push(arr[i]);
        break;
      }
    }
  }
  return results;
}
//Get the informations and send the message to every contacts the bot have been added to
function send_message() {
  //reset old data

  var url = "jdbc:mysql://" + server + ":" + port + "/" + db;
  console.log(url);
  try {
    var conn = Jdbc.getConnection(url, db_user, pwd);
  } catch (err) {
    Logger.log(err);
    return {
      text: "There is some error at database service. Please try again later",
    };
  }
  Logger.log(conn);
  conn.setAutoCommit(true);

  stmt = conn.createStatement();
  try {
    stmt.executeUpdate("update students set done=false,tomorrow=false;");
  } catch (err) {
    Logger.log(err);
  }
  stmt.close();
  conn.close();
  var service = get_chatbot_service();
  var spaces = get_spaces();
  /*var msg     = "Hey User its time to update about tomorrow. Are you coming tomorrow?\n\nAnswer with slash \
    command `/coming` followed with `yes` or `no`.\nExample: `/coming yes` \n\n(NOTE: You can only update this once till 7 A.M tomorrow).";*/
  Logger.log(spaces);
  var msg =
    "Hello all, From now putting a pause on FriendAttendance Bot daily reminder. \n\nBut still the data will reset daily at 12 Noon and you can \
still update your coming status and check who is coming. \nThanks";
  /*var urlt="https://chat.googleapis.com/v1/spaces/_78Yl4AAAAE/messages";
    Logger.log(urlt);
            var options = {
                method : 'POST',
                contentType: 'application/json',
                headers: { Authorization: 'Bearer ' + service.getAccessToken() },
                payload : JSON.stringify({text:"hi"})
  "cards": [
    {
      "sections": [
        {
          "widgets": [
            {
              "textParagraph": {
                "text": "<b>Roses</b> are <font color=\"#ff0000\">red</font>,<br><b>Violets</b> are <font color=\"#0000ff\">blue</font>."
              }
            }
          ]
        }
      ]
    }
  ]
})     //Add your message
            }
            var reques = UrlFetchApp.fetch(urlt, options);
            console.log(reques.getContentText());   //Send the messsage*/
  /* for (var i = 0; i < spaces.length; i++) {
        var space  = spaces[i];
        if (space.type == "DM") {    //Check if we are in DM
            var url = 'https://chat.googleapis.com/v1/'+ space.name +'/messages'; //Specify the URL with space name
            Logger.log(url);
            var options = {
                method : 'POST',
                contentType: 'application/json',
                headers: { Authorization: 'Bearer ' + service.getAccessToken() },
                payload : JSON.stringify({ text: msg })     //Add your message

                */
  /*payload : JSON.stringify({
                  "cards": [
                    {
                      "sections": [
                        {
                          "widgets": [
                            {
                              "textParagraph": {
                               // "text": "<b>Roses</b> are <font color=\"#FF748C\">red</font>,<br><b>Violets</b> are <font color=\"#8080FF\">blue</font>."
                               "text": "<b>Roses</b> are <b>red</b>,<br><b>Violets</b> are <b>blue</b>.<br><b>You still not using me</b>."
                              }
                            }
                          ]
                        }
                      ]
                    }
                  ]
                })*/
  /*}
            UrlFetchApp.fetch(url, options);   //Send the message
        }
    }*/
  return { text: "Reset Success, Message Sent." };
}

function send_custom_message(
  auto_run = null,
  registeration_number = "PIET21CA008",
  message_text = "test"
) {
  Logger.log(registeration_number);
  var url = "jdbc:mysql://" + server + ":" + port + "/" + db;
  console.log(url);
  try {
    var conn = Jdbc.getConnection(url, db_user, pwd);
  } catch (err) {
    Logger.log(err);
    return {
      text: "There is some error at database service. Please try again later",
    };
  }
  Logger.log(conn);
  conn.setAutoCommit(true);

  stmt = conn.createStatement();

  //conn.createStatement().executeQuery()
  var arr = [];

  console.log("Send Custom Message");
  try {
    registeration_number = registeration_number.trim();
  } catch (err) {
    Logger.log(err);
  }
  console.log(registeration_number);
  var rs = stmt.executeQuery(
    "select space_id from students where reg_num='" +
      registeration_number +
      "';"
  );

  while (rs.next()) {
    arr.push(rs.getString(1));
    //arr+=rs.getString(1);
  }

  console.log(arr);
  if (arr.length == 0) {
    console.info("User Not found for custom message");
    stmt.close();
    conn.close();
    return { text: "Registeration Number not found for custom message." };
  }
  stmt.close();
  conn.close();

  var space_url = arr[0];
  console.log(space_url);
  var service = get_chatbot_service();

  var urlt = "https://chat.googleapis.com/v1/" + space_url + "/messages";
  Logger.log(urlt);
  var options = {
    method: "POST",
    contentType: "application/json",
    headers: { Authorization: "Bearer " + service.getAccessToken() },
    payload: JSON.stringify({ text: message_text }),
    /*payload : JSON.stringify({
                  "cards": [
                    {
                      "sections": [
                        {
                          "widgets": [
                            {
                              "textParagraph": {
                               // "text": "<b>Roses</b> are <font color=\"#FF748C\">red</font>,<br><b>Violets</b> are <font color=\"#8080FF\">blue</font>."
                               "text": "<b>Roses</b> are <b>red</b>,<br><b>Violets</b> are <b>blue</b>.<br><b>You still not using me</b>."
                              }
                            }
                          ]
                        }
                      ]
                    }
                  ]
                })  */ //Add your message
  };
  var reques = UrlFetchApp.fetch(urlt, options);
  console.log(reques.getContentText()); //Send the message
  return { text: "Command done successfully" };
}

/**
 * Admin Command End
 */

/**
 * Connect to MySQL.
 */
function connectmysql() {
  var url = "jdbc:mysql://" + server + ":" + port + "/" + db;
  console.log(url);
  try {
    var conn = Jdbc.getConnection(url, db_user, pwd);
  } catch (err) {
    Logger.log(err);
    return {
      text: "There is some error at database service. Please try again later",
    };
  }
  Logger.log(conn);
  conn.setAutoCommit(true);

  stmt = conn.createStatement();

  //conn.createStatement().executeQuery()
  var rs = stmt.executeQuery("select * from students");
  let arr = [];
  while (rs.next()) {
    arr.push([
      rs.getString(1),
      rs.getString(2),
      rs.getString(3),
      rs.getString(4),
      rs.getString(5),
      rs.getString(6),
      rs.getString(7),
      rs.getBoolean("today"),
      rs.getBoolean("tomorrow"),
      rs.getBoolean("done"),
    ]);
  }
  try {
    //stmt.execute('insert into students(userid,name,reg_num,year,branch,section,today,tomorrow) values(1,"akshay","pie",1,"cse","d",false,false);')
  } catch (err) {
    return "Data with this registeration number already exists.";
    return { text: "Data with this registeration number already exists." };
  }

  Logger.log(arr);
  stmt.close();
  conn.close();
}

/**
 * Responds to a MESSAGE event in Google Chat.
 *
 * @param {Object} event the event object from Google Chat
 */

function register_user(full_message, user, space_name) {
  var url = "jdbc:mysql://" + server + ":" + port + "/" + db;
  console.log(url);
  try {
    var conn = Jdbc.getConnection(url, db_user, pwd);
  } catch (err) {
    Logger.log(err);
    return {
      text: "There is some error at database service. Please try again later",
    };
  }
  Logger.log(conn);
  conn.setAutoCommit(true);

  stmt = conn.createStatement();
  const pattern =
    /(piet|PIET|pgi|PGI|pce|PCE)[1-2][0-9](ca|ad|cs|cy|it|cr|CA|CS|AD|CY|IT|CR)[0-3][0-9][0-9]/;
  var displayID = user.name;
  //var full_message = " akshay piet21ca008 d";

  if (full_message == null) {
    return {
      text: "No input. Please provide text next to command like: /register Akshay PIET21CA008 D",
    };
  }
  full_message = full_message.trim();
  var message = full_message.split(" ");

  //Logger.log(message);
  if (message.length == 3) {
    var name = message[0];
    var reg_code = message[1];
    var section = message[2];
    if (pattern.test(reg_code) && /[A-Z|a-z]/.test(section)) {
      var current_year = new Date().getFullYear().toString().slice(2, 4);
      var studentYear = (
        current_year - reg_code.match(/[0-2][0-9]/g)[0]
      ).toFixed();
      var studentCollege = reg_code.match(/(piet|PIET|pgi|PGI|pce|PCE)/g)[0];
      var branch = reg_code.match(/(ca|ad|cs|cy|it|cr|CA|CS|AD|CY|IT|CR)/g)[0];
      reg_code = reg_code.toUpperCase();
      switch (branch) {
        case "CS":
        case "cs":
          branch = "CSE";
          break;
        case "AD":
        case "ad":
          branch = "AI&DS";
          break;
        case "CA":
        case "ca":
          branch = "CSE(AI)";
          break;
        case "CR":
        case "cr":
          branch = "CS(reg)";
          break;
        case "it":
        case "IT":
          branch = "IT";
          break;
        case "CY":
        case "cy":
          branch = "CS(cyb)";
          break;
      }
      Logger.log("Success");
      try {
        stmt.execute(
          'insert into students(space_id,userid,name,reg_num,college,branch,section,today,tomorrow) \
        values("' +
            space_name +
            '","' +
            displayID +
            '","' +
            name +
            '","' +
            reg_code +
            '","' +
            studentCollege +
            '","' +
            branch +
            '","' +
            section +
            '",false,false);'
        );
        stmt.close();
        conn.close();
        return { text: "Your data is successfully in our system," };
      } catch (err) {
        Logger.log(err);
        stmt.close();
        conn.close();
        return {
          text: "You have already registered with us.\n\n(If you haven't registered and still getting this message for your registeration number, then contact Akshay PIET21CA008, He will surely solve your problem ASAP.",
        };
      }
    } else {
      return {
        text: 'Your College Registeration Number or section doesn\'t matches required format.\n\nExample:Akshay PIET21CA008 D\n(Here "D" is your section)',
      };
    }
  } else {
    return {
      text: "Your input doesn't contain all required fields. Ex:Akshay PIET21CA008 D\n\n(Please don't include spaces in \
your name use PascalCase Ex: AkshayGoyal).",
    };
  }

  /*
    cell = sheet.getRange('A2').getValue();
    Logger.log(sheet.getLastRow());
    Logger.log(pattern.test('pi'));
    Logger.log(pattern.test('PIET21CA'));
    Logger.log(pattern.test('piet21cs'));
    */
}

function coming(message, user) {
  var url = "jdbc:mysql://" + server + ":" + port + "/" + db;
  console.log(url);
  try {
    var conn = Jdbc.getConnection(url, db_user, pwd);
  } catch (err) {
    Logger.log(err);
    return {
      text: "There is some error at database service. Please try again later",
    };
  }
  Logger.log(conn);
  conn.setAutoCommit(true);

  stmt = conn.createStatement();
  if (message == "" || message == null) {
    return {
      text: "Command usage: If you are coming tomorrow `/coming yes` or `/coming no` if you are not.",
    };
  }
  message = message.trim();
  message.toLowerCase();
  try {
    if (message == "yes") {
      user_res = true;
    } else if (message == "no") {
      user_res = false;
    }
    let query = stmt.executeUpdate(
      "update students set tomorrow=" +
        user_res +
        ', done=true where (userid="' +
        user.name +
        '" );'
    );
    Logger.log(query);
    if (query >= 1) {
      var pattern =
        /(piet|PIET|pgi|PGI|pce|PCE)[1-2][0-9](ca|ad|cs|cy|it|cr|CA|CS|AD|CY|IT|CR)/;
      var rs = stmt.executeQuery(
        'select reg_num,section,name from students where userid="' +
          user.name +
          '";'
      );
      let arr = [];
      while (rs.next()) {
        arr.push([rs.getString(1), rs.getString(2), rs.getString(3)]);
      }
      let reg_code = arr[0][0];
      let section = arr[0][1];
      let student_name = arr[0][2];
      var reg_code_details = pattern.exec(reg_code)[0];
      var rs = stmt.executeQuery(
        'select name,space_id from students where (reg_num like "' +
          reg_code_details +
          '%" \
      and section="' +
          section +
          '" and reg_num!="+reg_code+" );'
      );

      let arr2 = [];
      while (rs.next()) {
        arr2.push([rs.getString(1), rs.getString(2)]);
      }

      Logger.log(arr2);
      for (var i = 0; i < arr2.length; i++) {
        var msg_yes = "";
        if (message == "no") {
          var msg_yes = "not";
        }
        var msg_to_send =
          "Hello " +
          arr2[i][0] +
          ", *" +
          student_name +
          "* from your section is " +
          msg_yes +
          " coming tommorrow.";

        var service = get_chatbot_service();

        var urlt = "https://chat.googleapis.com/v1/" + arr2[i][1] + "/messages";
        Logger.log(urlt);
        var options = {
          method: "POST",
          contentType: "application/json",
          headers: { Authorization: "Bearer " + service.getAccessToken() },
          payload: JSON.stringify({ text: msg_to_send }),
        };
        var reques = UrlFetchApp.fetch(urlt, options);
      }

      return {
        text: 'Update is successful. Your answer is "' + message + '".',
      };
    } else {
      return {
        text: "It seems like you are not registered with us, try `/register` \nOr \nYou have already updated your choice(if you think this is a mistake, message/email to Akshay PIET21CA008).",
      };
    }
  } catch (err) {
    Logger.log(err);
  }

  stmt.close();
  conn.close();
}

function whoIsComing(user = { name: "users/105099087295067445150" }) {
  var url = "jdbc:mysql://" + server + ":" + port + "/" + db;
  console.log(url);
  try {
    var conn = Jdbc.getConnection(url, db_user, pwd);
  } catch (err) {
    Logger.log(err);
    return {
      text: "There is some error at database service. Please try again later",
    };
  }
  Logger.log(conn);
  conn.setAutoCommit(true);

  stmt = conn.createStatement();
  var pattern =
    /(piet|PIET|pgi|PGI|pce|PCE)[1-2][0-9](ca|ad|cs|cy|it|cr|CA|CS|AD|CY|IT|CR)/;
  var rs = stmt.executeQuery(
    'select reg_num,section from students where userid="' + user.name + '";'
  );
  let arr = [];
  while (rs.next()) {
    arr.push([rs.getString(1), rs.getString(2)]);
  }
  if (arr == "") {
    return {
      text: "Hey, you are not registered with us. You need to get register first use `/register` ",
    };
  } else {
    let reg_code = arr[0][0];
    let section = arr[0][1];
    var reg_code_details = pattern.exec(reg_code)[0];

    var rs = stmt.executeQuery(
      'select name,reg_num from students where (reg_num like "' +
        reg_code_details +
        '%" and section="' +
        section +
        '" and tomorrow=true and done = true);'
    );
    let arr2 = [];
    while (rs.next()) {
      arr2.push([rs.getString(1), rs.getString(2)]);
    }
    Logger.log(arr2);
    if (arr2.length != 0) {
      var message = "```";
      for (var i = 0; i < arr2.length; i++) {
        message += arr2[i][0] + ":" + arr2[i][1] + "\n";
      }
      message += "\n```";
    } else {
      var message = "```Nothing to show here```";
    }
    // NOT SECTION
    var rs = stmt.executeQuery(
      'select name,reg_num from students where (reg_num like "' +
        reg_code_details +
        '%" and section="' +
        section +
        '" and tomorrow=false and done = true);'
    );
    var arr3 = [];
    while (rs.next()) {
      arr3.push([rs.getString(1), rs.getString(2)]);
    }
    Logger.log(arr3);
    if (arr3.length != 0) {
      var message2 = "```";
      for (var i = 0; i < arr3.length; i++) {
        message2 += arr3[i][0] + ":" + arr3[i][1] + "\n";
      }

      message2 += "\n```";
    } else {
      var message2 = "```Nothing to show here```";
    }

    let final_message =
      "Here is list who is coming from your section\n" +
      message +
      "\n\nHere is list who is not coming from your section\n" +
      message2;
    Logger.log(final_message);
    return { text: final_message };
  }
  Logger.log(arr);
  stmt.close();
  conn.close();
}

const final_copy = [
    ["ABHIJEET SHARMA", "PIET21CA001", "15 Jul"],
    ["ABHISHEK GAUR", "PIET21CA002", "04 Jun"],
    ["ABHISHEK SAIN", "PIET21CA003", "14 Oct"],
    ["ABHISHEK SHARMA", "PIET21CA004", "22 Nov"],
    ["ADITYA SINGH", "PIET21CA005", "27 Feb"],
    ["AJAY SINGH", "PIET21CA006", "11 May"],
    ["AKSHITA SHARMA", "PIET21CA009", "26 Oct"],
    ["AMAN JAIN", "PIET21CA010", "18 Jul"],
    ["ANKITA THAKUR", "PIET21CA011", "31 Mar"],
    ["ARUSH JOHARI", "PIET21CA012", "30 May"],
    ["AYUSH MAHESHWARI", "PIET21CA015", "21 Jul"],
    ["DEV TEKWANI", "PIET21CA016", "09 Jan"],
    ["DIKSHA KUMAWAT", "PIET21CA017", "31 Mar"],
    ["GARIMA SARASWAT", "PIET21CA018", "12 Mar"],
    ["GUNJAN SHARMA", "PIET21CA019", "19 Jun"],
    ["HARSHITA JAIN", "PIET21CA020", "18 Dec"],
    ["HARSHVARDHAN PALIWAL", "PIET21CA021", "29 Jan"],
    ["KANISHKA KHANDELWAL", "PIET21CA022", "26 Jul"],
    ["KHUSHI BHARDWAJ", "PIET21CA024", "11 Feb"],
    ["KULDEEP TAK", "PIET21CA025", "10 Mar"],
    ["KUNAL SAINI", "PIET21CA026", "04 Jun"],
    ["MANISH RAMLANI", "PIET21CA027", "13 Jan"],
    ["MANISH YADAV", "PIET21CA028", "31 Mar"],
    ["MOHAMMAD ASIF NEYAZI", "PIET21CA029", "13 Feb"],
    ["MOHAMMED JUNAID", "PIET21CA030", "31 Oct"],
    ["NAVDEEP DORIYA", "PIET21CA032", "13 Mar"],
    ["PALAK SHARMA", "PIET21CA033", "10 Aug"],
    ["PILLAI ABHIJETH", "PIET21CA034", "04 Nov"],
    ["PREETISH MEHTA", "PIET21CA035", "07 Jul"],
    ["PRINCE CHOUHAN", "PIET21CA036", "24 Oct"],
    ["PRIYANK KHANDELWAL", "PIET21CA037", "28 Dec"],
    ["PUNEET DADHICH", "PIET21CA038", "19 Mar"],
    ["RAGHUVEER SINGH RATHORE", "PIET21CA039", "04 Oct"],
    ["RAHUL SHARMA", "PIET21CA040", "29 Jul"],
    ["RAJ ADITYA", "PIET21CA041", "06 Oct"],
    ["RAJ MEHTA", "PIET21CA042", "22 Dec"],
    ["RAKSHA KHANDELWAL", "PIET21CA044", "25 Oct"],
    ["RAMNARAYAN SHARMA", "PIET21CA045", "06 Aug"],
    ["RAVI PRAJAPAT", "PIET21CA047", "08 Jul"],
    ["RIDDHI SHARMA", "PIET21CA048", "13 Feb"],
    ["RITIK KUMAR", "PIET21CA049", "18 Jul"],
    ["SANJEEV RANJAN", "PIET21CA050", "16 May"],
    ["SHASHANK SHEKHAWAT", "PIET21CA051", "18 Jul"],
    ["SHEKH ALTAF ALI", "PIET21CA052", "07 Oct"],
    ["SIMMI CHAUDHARY", "PIET21CA053", "11 Jan"],
    ["TILAK VAISHNAV", "PIET21CA054", "26 Oct"],
    ["TUSHAR KHUTETA", "PIET21CA055", "07 Apr"],
    ["UTKARSH SHARMA", "PIET21CA056", "06 May"],
    ["VAIBHAV TIWARI", "PIET21CA057", "04 Aug"],
    ["VAISHNAVI GOYAL", "PIET21CA058", "15 Jan"],
    ["VISHAL YADAV", "PIET21CA059", "09 Sep"],
    ["YASH SONI", "PIET21CA060", "29 Oct"],
    ["YUVRAJ NAMA", "PIET21CA061", "05 Dec"],
]
function get_birthday(user_name='users/105099087295067445150',name=null,reg_code=null) {
  var url = "jdbc:mysql://" + server + ":" + port + "/" + db;
  
  try {
    var conn = Jdbc.getConnection(url, db_user, pwd);
  } catch (err) {
    Logger.log(err);
    return {
      text: "There is some error at database service. Please try again later",
    };
  }
  conn.setAutoCommit(true);

  stmt = conn.createStatement();
  var rs = stmt.executeQuery(
    'select reg_num,section from students where userid="' + user_name + '";'
  );
  arr = [];
  while (rs.next()) {
    arr.push([rs.getString(1), rs.getString(2)]);
  }
  if (arr == "") {
    return {
      text: "Hey, you are not registered with us. You need to get register first use `/register` ",
    };
  }
  Logger.log(name,reg_code);

  if(name){
    let searched = searchArray(final_copy,name,0);
    Logger.log(searched);
    if(searched.length>0){
        var message_to_s = "";
        searched.forEach(search => {
            message_to_s+=search[0] + " : " + search[2] + "\n";
        });
      return {
        text: message_to_s,
      };
    }

    else{
      return {
        text: "Sorry, we don't have any record for this name",
      };
    }
  }
  if(reg_code){
    let searched = searchArray(final_copy,reg_code,1);
    Logger.log(searched);
    if (searched.length > 0) {
        var message_to_s = "";
      searched.forEach((search) => {
        message_to_s += search[0] + " : " + search[2] + "\n";
      });
      return {
        text: message_to_s,
      };
    } else {
      return {
        text: "Sorry, we don't have any record for this registeration number",
      };
    }
  }
  conn.close();
}
    

/*
function get_marks(user_name='users/105099087295067445150',arg_text="PIET21CA008"){
  var url = "jdbc:mysql://" + server+":"+port+"/"+db;
  Logger.log(url);
  try{
    var conn = Jdbc.getConnection(url, db_user, pwd);
  }
  catch(err){
    Logger.log(err);
    return {'text':"There is some error at database service. Please try again later"};
  }
  
  conn.setAutoCommit(true);
  
  stmt = conn.createStatement();
  var rs = stmt.executeQuery("select reg_num from students where userid='"+user_name+"';");
  var arr=[];
  while(rs.next()){
    arr.push(rs.getString(1));
  }
  console.log(arr);
  //console.log(rs.getObject(1));
  if (arr==[]){
    console.info("Not found");
    return{"text":"You are not registered with us. First register yourself with `/register` command."}
  }
  stmt.close();
  conn.close();
  
  arg_text = arg_text.trim();
  var marks = {
    "PIET21CA002":44,
    "PIET21CA003":43,
    "PIET21CA004":39,
    "PIET21CA005":28,
    "PIET21CA006":34,
    "PIET21CA007":55,
    "PIET21CA008":60,
    "PIET21CA009":56,
    "PIET21CA010":41,
    "PIET21CA011":47,
    "PIET21CA012":40,
    "PIET21CA013":44,
    "PIET21CA014":37,
    "PIET21CA015":33,
    "PIET21CA016":57,
    "PIET21CA017":"AB",
    "PIET21CA018":54,
    "PIET21CA019":30,
    "PIET21CA020":30,
    "PIET21CA021":28,
    "PIET21CA022":"AB",
    "PIET21CA023":"AB",
    "PIET21CA024":48,
    "PIET21CA025":24,
    "PIET21CA026":9,
    "PIET21CA027":27,
    "PIET21CA028":27,
    "PIET21CA029":24,
    "PIET21CA030":4,
    "PIET21CA031":4,
    "PIET21CA032":32,
    "PIET21CA033":24,
    "PIET21CA034":11,
    "PIET21CA035":37,
    "PIET21CA036":"AB",
    "PIET21CA037":8,
    "PIET21CA038":27,
    "PIET21CA039":7,
    "PIET21CA040":1,
    "PIET21CA041":"AB",
    "PIET21CA042":"34",
    "PIET21CA043":51,
    "PIET21CA044":27,
    "PIET21CA045":29,
    "PIET21CA046":"AB",
    "PIET21CA047":14,
    "PIET21CA048":9,
    "PIET21CA049":5,
    "PIET21CA050":"AB",
    "PIET21CA051":51,
    "PIET21CA052":9,
    "PIET21CA053":28,
    "PIET21CA054":46,
    "PIET21CA056":11,
    "PIET21CA056":8,
    "PIET21CA057":25,
    "PIET21CA058":24,
    "PIET21CA059":"AB",
    "PIET21CA060":14,
    "PIET21CA061":27,
    
    
  }
  if(Boolean(marks[arg_text.toUpperCase()])){
    return {"text":arg_text+",your marks in PPS is "+marks[arg_text.toUpperCase()].toString()}
  }
  else{
    return {"text":"Registeration number is invalid."}
  }
}
*/

function test2(arg_text = "admin_akshay send_message PIET21ca008 Hello Hi") {
  arg_text = arg_text.substring(arg_text.indexOf(" ") + 1);
  arg_text.trim();
  if (arg_text.startsWith("send_message")) {
    msg_code_text = arg_text.substring(arg_text.indexOf(" ") + 1);
    msg_code_text.trim();
    user_code = msg_code_text
      .substring(0, msg_code_text.indexOf(" "))
      .trim()
      .toUpperCase();
    const pattern =
      /(piet|PIET|pgi|PGI)[1-2][0-9](ca|ad|cs|CA|CS|AD)[0-3][0-9][0-9]/;

    if (pattern.test(user_code)) {
      message_text = msg_code_text
        .substring(msg_code_text.indexOf(" ") + 1)
        .trim();
      console.log(arg_text);
      console.log(msg_code_text);
      console.log(user_code);

      console.log(message_text);
      return send_custom_message(user_code, message_text);
    } else {
      Logger.log("<Send Message>, Not in required format.");
      return { text: "Not in required format." };
    }
  }
  //return send_custom_message(reg_code);
  /*if (arg_text.startsWith("send_message")){
      send_msg_arg_text = arg_text.split(" ");
      reg_code = send_msg_arg_text.substring(0, send_msg_arg_text.indexOf(' ')); 
      message_text = send_msg_arg_text.substring(send_msg_arg_text.indexOf(' ') + 1);
      const pattern = /(piet|PIET|pgi|PGI)[1-2][0-9](ca|ad|cs|CA|CS|AD)[0-3][0-9][0-9]/

      if(pattern.test(reg_code)){
          return send_custom_message(reg_code);
      }
      

    }*/
}
function onMessage(event) {
  var userProperties = PropertiesService.getUserProperties();
  if (!userProperties.getProperty("initialized")) {
    // handle the onAddToSpace initialization logic here.
    userProperties.setProperties({ initialized: "true" });
  }
  var name = "";

  if (event.space.type == "DM") {
    name = "You";
  } else {
    name = event.user.displayName;
  }
  /*if(event.user.name == "users/105099087295067445150"){
    return {'text':event.space.name}
  }*/
  if (
    event.message.text == "admin_akshay_reset_command" &&
    event.user.name == "users/105099087295067445150"
  ) {
    return send_message();
  }
  if (
    event.message.text.startsWith("admin_akshay") &&
    event.user.name == "users/105099087295067445150"
  ) {
    arg_text = event.message.text;
    arg_text = arg_text.substring(arg_text.indexOf(" ") + 1);
    arg_text.trim();
    if (arg_text.startsWith("send_message")) {
      msg_code_text = arg_text.substring(arg_text.indexOf(" ") + 1);
      msg_code_text.trim();
      user_code = msg_code_text
        .substring(0, msg_code_text.indexOf(" "))
        .trim()
        .toUpperCase();
      const pattern =
        /(piet|PIET|pgi|PGI)[1-2][0-9](ca|ad|cs|CA|CS|AD)[0-3][0-9][0-9]/;

      if (pattern.test(user_code)) {
        message_text = msg_code_text
          .substring(msg_code_text.indexOf(" ") + 1)
          .trim();
        console.log(arg_text);
        console.log(msg_code_text);
        console.log(user_code);

        console.log(message_text);
        return send_custom_message(user_code, message_text);
      } else {
        Logger.log("<Send Message>, Not in required format.");
        return { text: "Not in required format." };
      }
    }
  }
  if (event.message.slashCommand) {
    switch (event.message.slashCommand.commandId) {
      case 2: // /vote
        return {
          text: "Hello I am FriendsAttendanceBot created by Akshay(PIET21CA008) for special purpose which is to find if your friend is coming \
tomorrow in college. Now you don't have to disturb your friend for this silly mesage 'Are you coming Tomorrow?'.\nStart with registering yourself with `/register`",
        };
        return vote(message.argumentText);

      case 3:
        //return {'text':event.message}

        return register_user(
          event.message.argumentText,
          event.user,
          event.space.name
        );

      case 4:
        return coming(event.message.argumentText, event.user);

      case 5:
        return whoIsComing(event.user);

      case 6:
        help_message =
          "Here is the list of commands with usage\n\n\
```/register : To register yourself in my database.\nCommand= /register your_first_name registeration_code section\n\n\n\
/coming : Update your preference for tomorrow in 'yes' or 'no'\n\n\n\
/who_is_coming : To check who is coming from your section tomorrow(working days*)\n\n\n\
/info : To know about me😎.```";
        return { text: help_message };

      /*case 7:
        return get_marks(event.user.name,event.message.argumentText);
      */
     case 7:
        let message_text = event.message.argumentText.toLowerCase().trim();
        // Logger.log(message_text);
        Logger.log(message_text.startsWith('piet'));
        if (message_text.startsWith('piet')){
            return get_birthday(user_name=event.user.name,reg_code=message_text.toUpperCase());
        }
        else{
            return get_birthday(user_name=event.user.name,name=message_text.toUpperCase());
        }
       
      default:
        return { text: "no output" };
    }
  }

  //var message = name + " said \"" + event.message.text + "\""+" \nI am glad to receive message from you.";
  var message =
    "I cannot respond to that😔, I can only respond to slash commands😎";

  // Other existing handling for users invoking your app by name.
  return { text: message };
}

function check_birthday(){
  const day = new Date();
  const m = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
  const str_op = day.getDate() + ' ' + m[day.getMonth()];
  console.log(str_op);
  final_copy.forEach(student => {
    if (str_op === student[2]){
      console.log(student);

      var rs = stmt.executeQuery(
        'select reg_num,section from students where userid="' + user.name + '";'
      );
      let arr = [];
      while (rs.next()) {
        arr.push([rs.getString(1), rs.getString(2)]);
      }
      if (arr == "") {
        return {
          text: "Hey, you are not registered with us. You need to get register first use `/register` ",
        };
      } else {
        let reg_code = arr[0][0];
        let section = arr[0][1];
        var reg_code_details = pattern.exec(reg_code)[0];

        var rs = stmt.executeQuery(
          'select name,reg_num from students where (reg_num like "' +
            reg_code_details +
            '%" and section="' +
            section +
            '" and tomorrow=true and done = true);'
        );
        let arr2 = [];
        while (rs.next()) {
          arr2.push([rs.getString(1), rs.getString(2)]);
        }
        Logger.log(arr2);
        if (arr2.length != 0) {
          var message = "```";
          for (var i = 0; i < arr2.length; i++) {
            message += arr2[i][0] + ":" + arr2[i][1] + "\n";
          }
          message += "\n```";
        } else {
          var message = "```Nothing to show here```";
        }
        // NOT SECTION
        var rs = stmt.executeQuery(
          'select name,reg_num from students where (reg_num like "' +
            reg_code_details +
            '%" and section="' +
            section +
            '" and tomorrow=false and done = true);'
        );
        var arr3 = [];
        while (rs.next()) {
          arr3.push([rs.getString(1), rs.getString(2)]);
        }
      for (var i = 0; i < spaces.length; i++) {
      var space  = spaces[i];
      if (space.type == "DM") {    //Check if we are in DM
          var url = 'https://chat.googleapis.com/v1/'+ space.name +'/messages'; //Specify the URL with space name
          Logger.log(url);
          var options = {
              method : 'POST',
              contentType: 'application/json',
              headers: { Authorization: 'Bearer ' + service.getAccessToken() },
              payload : JSON.stringify({ text: msg })     //Add your message
          };
          var response = UrlFetchApp.fetch(url, options);
          Logger.log(response);
      
      
      }
    }
  });
}
/**
 * Responds to an ADDED_TO_SPACE event in Google Chat.
 *
 * @param {Object} event the event object from Google Chat
 */
function onAddToSpace(event) {
  var message = "";

  if (event.space.singleUserBotDm) {
    var userProperties = PropertiesService.getUserProperties();
    if (!userProperties.getProperty("initialized")) {
      // handle the onAddToSpace initialization logic here.
      userProperties.setProperties({ initialized: "true" });
    }
    message =
      event.user.displayName + "!, Thank You for checking me😉. Type `/info`";
  } else {
    PropertiesService.getScriptProperties().setProperty(e.space.name, "");
    message =
      "Thank you for adding me to " +
      (event.space.displayName ? event.space.displayName : "this chat");
    return { text: message };
  }

  if (event.message) {
    // Bot added through @mention.
    message =
      "Thank you for adding me to " +
      (event.space.displayName ? event.space.displayName : "this chat");
  }

  return { text: message };
}

/**
 * Responds to a REMOVED_FROM_SPACE event in Google Chat.
 *
 * @param {Object} event the event object from Google Chat
 */
function onRemoveFromSpace(event) {
  console.info(
    "Bot removed from ",
    event.space.name ? event.space.name : "this chat"
  );

  PropertiesService.getScriptProperties().deleteProperty(event.space.name);
}
