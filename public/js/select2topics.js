$('#tags').select2({
    multiple: true,
    maximumSelectionLength: 3,
    tokenSeparators: [',', ' ', ";"],
    theme: "bootstrap-5",
    closeOnSelect: false,
});

$('#filterTags').select2({
    multiple: true,
    width: '25%',
    tokenSeparators: [',', ' ', ";"],
    theme: "bootstrap-5",
    placeholder: "Filter by Tags",
    closeOnSelect: false,
});

$('#filterMobileTags').select2({
    multiple: true,
    maximumSelectionLength: 3,
    tokenSeparators: [',', ' ', ";"],
    theme: "bootstrap-5",
    placeholder: "Tags",
    closeOnSelect: false,
});

$('#favoriteTags').select2({
    multiple: true,
    tokenSeparators: [',', ' ', ";"],
    theme: "bootstrap-5",
    closeOnSelect: false,
});
