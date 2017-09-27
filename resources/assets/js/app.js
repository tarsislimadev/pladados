jQuery(document).ready(function () {
    viewModel = new ViewModel();
    ko.applyBindings(viewModel);
    viewModel.init && viewModel.init();
});