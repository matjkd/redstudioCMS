  
function loadfeed() {
  var feeds = [
    {
      title: 'Provided by Kenneth Elliott &amp; Rowe',
      url: 'http://www.ker.co.uk/newsfeed?format=feed&type=atom'
    }
  ];

  var options = {
    stacked : true,
    horizontal : false,
    title : "Legal News",
    numResults : 8
  };

  new GFdynamicFeedControl(feeds, 'feedControl', options);
  document.getElementById('feedControl');
}
google.load("feeds", "1");
google.setOnLoadCallback(loadfeed);
