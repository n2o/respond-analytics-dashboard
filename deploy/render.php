<?php
if (!isset($var1) or $var1 == '') {
  echo $var1;
  echo "Please define the Google ClientID in the Admin Panel.";
} else {
?>

<script type="text/javascript" src="plugins/respond_analytics_dashboard/assets/js/platform.js"></script>

<link rel="import" href="plugins/respond_analytics_dashboard/elements/ga-auth.html">
<link rel="import" href="plugins/respond_analytics_dashboard/elements/ga-dashboard.html">
<link rel="import" href="plugins/respond_analytics_dashboard/elements/ga-chart.html">
<link rel="import" href="plugins/respond_analytics_dashboard/elements/ga-viewpicker.html">
<link rel="import" href="plugins/respond_analytics_dashboard/elements/ga-datepicker.html">

<iframe id="logoutframe" data-src="https://accounts.google.com/logout" src="about:blank" style="display: none"></iframe>

<div>
  <ga-auth clientid="<?php echo $var1; ?>"></ga-auth>
</div>

<div>
  <br>
  <button id="kill-session" type="button" class="btn btn-default">Logout from Google</button>
  <br><br>

  <ga-dashboard>
    <div id="controls">
      <ga-viewpicker></ga-viewpicker>
      <ga-datepicker
        startDate="30daysAgo"
        endDate="yesterday">
      </ga-datepicker>
    </div>

    <div id="charts">
      <ga-chart
        title="Timeline"
        type="LINE"
        metrics="ga:sessions"
        dimensions="ga:date">
      </ga-chart>

      <ga-chart
        title="Top pages"
        type="TABLE"
        metrics="ga:sessions"
        dimensions="ga:pagePath"
        sort="-ga:sessions"
        maxResults="8">
      </ga-chart>

      <ga-chart
        title="Sessions (by country)"
        type="GEO"
        metrics="ga:sessions"
        dimensions="ga:country">
      </ga-chart>

      <ga-chart
        title="Top Browsers"
        type="COLUMN"
        metrics="ga:sessions"
        dimensions="ga:browser"
        sort="-ga:sessions"
        maxResults="5">
      </ga-chart>

    </div>

  </ga-dashboard>
</div>

<script type="text/javascript">
  $("#kill-session").click(function() {
      var iframe = $("#logoutframe");
      iframe.attr("src", iframe.data("src"));
  });
</script>

<?php
}
?>
