(function() {
    
	tinymce.PluginManager.add('loremipsum', function( editor, url ) {
		editor.addButton( 'loremipsum', {
			text: '',
			image: url+'/images/icon.png',
			type: 'button',
			onclick: function() {
                editor.windowManager.open( {
                    title: 'Insert Lorem Ipsum Words',
                    body: [
                        {
                            type: 'textbox',
                            name: 'numWords',
                            label: 'Number of words to insert?',
                            value: '130'
                        }

                    ],
                    onsubmit: function( e ) {
                        jQuery.post(url+'/ajax_load.php?words='+e.data.numWords, function(data) {
                          editor.insertContent( data);
                            editor.windowManager.close();
                        });


                    }
                });
            }

		});
	});
})();
