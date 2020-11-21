/* JavaScript Example: */
/* Load the VidyoClient.js script and pass the onVidyoClientLoaded callback as an onload parameter */

  function onVidyoClientLoaded(status) {
    switch (status.state) {
      case "READY":    // The library is operating normally
        // After the VidyoClient/VidyoConnector is successfully initialized,
        // a global VC object will become available.
        //
        // Load the rest of the application here
        // ...
        break;
      case "RETRYING":     // The library operating is temporarily paused
        break;
      case "FAILED":       // The library operating has stopped
        break;
      case "FAILEDVERSION":// The version of the Javascript library does not match the plugin
        status.plugInVersion; // The Version of the plugin currently installed
        status.jsVersion;     // The Version of the Javascript library loaded
        break;
      case "NOTAVAILABLE": // The library is not available
        break;
    }
    status.downloadType;                       // Available download types with possible values of "MOBILE" "PLUGIN" "APP"
    status.downloadPathApp;                    // Path to the application installer for the app which could be invoked with a protocol handler
    status.downloadPathPlugIn;                 // Path to the Plugin that can be installed
    status.downloadPathWebRTCExtensionChrome;  // Path to the optional Chrome extension required for Screen Sharing in WebRTC
    status.downloadPathWebRTCExtensionFirefox; // Path to the optional Firefox extension required for Screen Sharing in WebRTC
    return true; // Return true to reload the plugins if not available
  }


/* JavaScript Example: */
/* Assume that the DOM has a div with id="renderer" where the preview and the live conference should be rendered */
/* After the VidyoClient is successfully initialized a global VC object will become available  */
VC.CreateVidyoConnector({
  viewId: "renderer",                            // Div ID where the composited video will be rendered, see VidyoConnector.html
  viewStyle: "VIDYO_CONNECTORVIEWSTYLE_Default", // Visual style of the composited renderer
  remoteParticipants: 15,                        // Maximum number of participants
  logFileFilter: "warning all@VidyoConnector info@VidyoClient",
  logFileName:"",
  userData:""
}).then(function(vidyoConnector) {
   vidyoConnector.Connect({
     host: "prod.vidyo.io",
     token: "cHJvdmlzaW9uAGdvdmluZHN1bWFuQDhkMTBlOC52aWR5by5pbwA2Mzc2NTc3NTcxNgAAOTg3MDU0OGMxYTQ4MTAzNDNlYmE1ZmYxYmRhNDNmOTc5ZGYyMjU0Zjk3ZWQ2MWI4ODRjMjM5MDRjZGVkMmM1ODM0MjJjMzRmMGY0ODUxMWZlZWZkMTg4MDgxY2EzNmZj",
     displayName: "Govind",
     resourceId: "GovindRoom",
     // Define handlers for connection events.
     onSuccess: function()            {/* Connected */},
     onFailure: function(reason)      {/* Failed */},
     onDisconnected: function(reason) {/* Disconnected */}
    }).then(function(status) {
        if (status) {
            console.log("ConnectCall Success");
        } else {
            console.error("ConnectCall Failed");
        }
    }).catch(function() {
        console.error("ConnectCall Failed");
    });
}).catch(function() {
  console.error("CreateVidyoConnector Failed");
});

/* JavaScript Example: */
vidyoConnector.RegisterParticipantEventListener(
{
  onJoined: function(participant) { /* Participant Joined */ },
  onLeft: function(participant)   { /* Participant Left */ },
  onDynamicChanged: function(participants) { /* Ordered array of participants according to rank */ },
  onLoudestChanged: function(participant, audioOnly) { /* Current loudest speaker */ }
}).then(function() {
  console.log("RegisterParticipantEventListener Success");
}).catch(function() {
  console.err("RegisterParticipantEventListener Failed");
});