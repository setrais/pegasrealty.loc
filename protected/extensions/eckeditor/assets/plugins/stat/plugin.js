/*
 * @file text statistics plugin for CKEditor
 * Copyright (C) 2012 Chupurnov Valeriy <leroy@xdan.ru>(http://xdan.ru)
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 */

 // use plugin "change"
CKEDITOR.plugins.add( 'stat',{
	lang:[ CKEDITOR.lang.detect( 'en' ) ],
	init : function( editor ){
		var trim = function ( str ){
			return str.replace(/^[\s]+([^\s])/g,'\1').replace(/([^\s])[\s]+$/g,'\1');
		}
		function getAreaSelection() {
			var textArea = editor.textarea.$;
			if (document.selection) { //IE
				var bm = document.selection.createRange().getBookmark();
				var sel = textArea.createTextRange();
				sel.moveToBookmark(bm);

				var sleft = textArea.createTextRange();
				sleft.collapse(true);
				sleft.setEndPoint("EndToStart", sel);
				textArea.selectionStart = sleft.text.length
				textArea.selectionEnd = sleft.text.length + sel.text.length;
				textArea.selectedText = sel.text;  
			}else if (textArea.selectionStart){ //FF
				textArea.selectedText = textArea.value.substring(textArea.selectionStart,textArea.selectionEnd);
			}
			return textArea.selectedText;
		}
		var getAreaSelection1 = function(){
			var startPos = 0, endPos = 0 , selection ='';
			if ( editor.mode != 'source' ) return '';
			if (typeof(editor.textarea.$.selectionStart) != "undefined") { 
				startPos = editor.textarea.$.selectionStart; endPos = editor.textarea.$.selectionEnd;
			}else{ 
				if (window.getSelection){ 
					selection = window.getSelection(); 
				}else if (document.getSelection){ 
					selection = document.getSelection(); 
				}else if (document.selection){ 
					selection = document.selection.createRange().text; 
				}
				if( selection ){
					startPos = editor.textarea.$.indexOf(selection);
					if (startPos!= 0)
						endPos = editor.textarea.$.indexOf(selection) + selection.length; 
				}
			}
			return  editor.textarea.$.value.substring( startPos, endPos ); 
		} 
		var strip = function( str ) {
            var key = '';
            var matches = [];
            str += '';
            matches = str.match(/(<\/?[\S][^>]*>|&[a-z]+;)/gi);
            for (key in matches) {
                if ( isNaN(key) )continue;
                str = str.split(matches[key].toString()).join(' '); // Custom replace. No regexing
            }
            return trim(str.replace(/[\s]/gi,''));
		}
		var statText = function(){
			var text = editor.getData()+'';
			document.getElementById( 'cke_stat_'+editor.name )&& (document.getElementById( 'cke_stat_'+editor.name ).innerHTML = editor.lang.stat.strlen+':'+strip(text).length);
			document.getElementById( 'cke_stat_source_'+editor.name )&& (document.getElementById( 'cke_stat_source_'+editor.name ).innerHTML = editor.lang.stat.source+':'+text.length);
		}
		
		editor.on( 'instanceReady', function(e) { 
			var places = ['stat','stat_select','stat_source'];
			var style =  'float:left; line-height:23px; margin-left:10px;';
			for(var r in places){
				var div = document.createElement('div');
				div.setAttribute('id','cke_'+places[r]+'_'+editor.name);
				div.setAttribute('style',style);
				document.getElementById( 'cke_bottom_'+editor.name ).appendChild(div);
			}
			window.onmousemove = function(e){
				if( startSelect )getStatSelect();
			};
			window.onmouseup = function(e){
				startSelect = false;
			};
			statText();
		});
		var timerSelect = 0;
		function _getStatSelect(){
				var text = '';
				if ( editor.mode != 'source' ){
					var sel = editor.getSelection();
					text = (sel&&sel.getType()==CKEDITOR.SELECTION_TEXT&&sel.getSelectedText()!==null)?strip(sel.getSelectedText()):'';
				}else{
					text = getAreaSelection(); 
				}
				document.getElementById( 'cke_stat_select_'+editor.name )&&(document.getElementById( 'cke_stat_select_'+editor.name ).innerHTML = editor.lang.stat.sel+':'+text.length);
		}
		var getStatSelect = function(){
			clearTimeout(timerSelect);
			timerSelect = setTimeout(_getStatSelect,100);
		}
		var keyDownEvent = function(e){
			if ( e.data.$.shiftKey ){
				var keyCode = e.data.$.keyCode;
				if( keyCode>=33&&keyCode<=40 )getStatSelect();
			}
		}
		var startSelect = false;
		editor.on( 'mode', function( e ){
			if ( editor.mode != 'source' )
				return;
			editor.textarea.on( 'keyup',keyDownEvent);
			editor.textarea.on('mousedown',function(e){
				startSelect = true;
			});
		});
		editor.on( 'contentDom', function(e){
			this.getCommand('cut').on('state',getStatSelect)
			editor.document.on('keyup',keyDownEvent);
			editor.document.on('mousedown',function(e){
				startSelect = true;
			});
			editor.document.on('mouseup',function(e){
				startSelect = false;
			});
		});
		editor.on( 'selectionChange', getStatSelect );
		editor.on( 'change', statText);
		
	}
} );
