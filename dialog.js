tinyMCEPopup.requireLangPack();

var LoremIpsumDialog = {
	init : function() {
		var f = document.forms[0];

		// Get the selected contents as text and place it in the input
		//f.someval.value = tinyMCEPopup.editor.selection.getContent({format : 'text'});
		//f.somearg.value = tinyMCEPopup.getWindowArg('some_custom_arg');
	},

	insert : function() {
		// Insert the contents from the input into the document

		$.post('ajax_load.php?words='+$('#words').val(), function(data) {
			tinyMCEPopup.editor.execCommand('mceInsertContent', false, data);
			tinyMCEPopup.close();
		});
	}
};

tinyMCEPopup.onInit.add(LoremIpsumDialog.init, LoremIpsumDialog);
