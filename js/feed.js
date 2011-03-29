  
function loadfeed() {
  var feeds = [
    {
      title: 'Legal News',
      url: 'http://www.ker.co.uk/newsfeed?format=feed&type=atom'
    }
  ];

  var options = {
    stacked : true,
    horizontal : false,
    title : "Kenneth Elliott & Rowe",
    numResults : 8
  };

  new GFdynamicFeedControl(feeds, 'feedControl', options);
  document.getElementById('feedControl').style.width = "650px";
}
google.load("feeds", "1");
google.setOnLoadCallback(loadfeed);
