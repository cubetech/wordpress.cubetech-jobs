tinymce.create( 
	'tinymce.plugins.cubetech_jobs', 
	{
	    /**
	     * @param tinymce.Editor editor
	     * @param string url
	     */
	    init : function( editor, url ) {
			/**
			*  register a new button
			*/
			editor.addButton(
				'cubetech_jobs_button', 
				{
					cmd   : 'cubetech_jobs_button_cmd',
					title : editor.getLang( 'cubetech_jobs.buttonTitle', 'cubetech Jobs' ),
					image : url + '/../img/toolbar-icon.png'
				}
			);
			/**
			* and a new command
			*/
			editor.addCommand(
				'cubetech_jobs_button_cmd',
				function() {
					/**
					* @param Object Popup settings
					* @param Object Arguments to pass to the Popup
					*/
					editor.windowManager.open(
						{
							// this is the ID of the popups parent element
							id       : 'cubetech_jobs_dialog',
							width    : 480,
							title    : editor.getLang( 'cubetech_jobs.popupTitle', 'cubetech Jobs' ),
							height   : 'auto',
							wpDialog : true,
							display  : 'block',
						},
						{
							plugin_url : url
						}
					);
				}
			);
		}
	}
);

// register plugin
tinymce.PluginManager.add( 'cubetech_jobs', tinymce.plugins.cubetech_jobs );