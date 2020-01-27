if (navigator.serviceWorker) {
  navigator.serviceWorker.register('/www/update_status/status_dashboard/sw.js').then(function(registration) {
    console.log('ServiceWorker registration successful with scope:',  registration.scope);
  }).catch(function(error) {
    console.log('ServiceWorker registration failed:', error);
  });
}