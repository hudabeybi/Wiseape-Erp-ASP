using System;
using System.Text;
using System.Collections.Generic;
using System.Collections;
using Soonda_Library.BO;
using Soonda_Library.Controls;
using SoondaDbProvider;
using SoondaUtility;
public class Page {
  public MyStreamWriter me;
  public MyStreamWriter Response;
  public string SectionText0;
  public string SectionText2;
  public string SectionText4;
  public string SectionText6;
  public string SectionText8;
  public string SectionText10;
  public string SectionText12;
  public string SectionText14;
  public string SectionText16;
  public string SectionText18;
  public string SectionText20;
  public string SectionText22;
  public string SectionText24;
  public string SectionText26;
  public string SectionText28;
  public string SectionText30;
  public string SectionText32;
  public string SectionText34;
  public string SectionText36;
  public string SectionText38;
  public string SectionText40;
  public string SectionText42;
  public string SectionText44;
  public string SectionText46;
  public string SectionText48;
  public string SectionText50;
  public string SectionText52;
  public string SectionText54;
  public string SectionText56;
  public string SectionText58;
  public string SectionText60;
  public string SectionText62;
  public string SectionText64;
  public string SectionText66;
  public string SectionText68;
  public string SectionText70;
  public string SectionText72;
  public string SectionText74;
  public string SectionText76;
  public string SectionText78;
  public string SectionText80;
  public string SectionText82;
  public string SectionText84;
  public string SectionText86;
  public string SectionText88;
  public string SectionText90;
  public string SectionText92;
  public string SectionText94;
  public string SectionText96;
  public string SectionText98;
  public string SectionText100;
  public string SectionText102;
  public string SectionText104;
  public string SectionText106;
  public string SectionText108;
  public string SectionText110;
  public string SectionText112;
  public string SectionText114;
  public string SectionText116;
  public string SectionText118;
  public string SectionText120;
  public string SectionText122;
  public string SectionText124;
  public string SectionText126;
  public string SectionText128;
  public string SectionText130;
  public string SectionText132;
  public string SectionText134;
  public string SectionText136;
  public string SectionText138;
  public string SectionText140;
  public string SectionText142;
  public string SectionText144;
  public string SectionText146;
  public string SectionText148;
  public string SectionText150;
  public string SectionText152;
  public string SectionText154;
  public string SectionText156;
  public string SectionText158;
  public string SectionText160;
  public string SectionText162;
  public string SectionText164;
  public string SectionText166;
  public string SectionText168;
  public string SectionText170;
  public string SectionText172;
  public Soonda_Library.BO.ProjectClass Project;
  public Soonda_Library.BO.ModuleClass Module;
  public Page() {}
  public void RenderPage() {
    me.say(SectionText0);
 me.say(Module.ModuleName);     me.say(SectionText2);

	foreach (ModuleClass childModule in Module.ChildModules)
    {
    me.say(SectionText4);
 me.say( childModule.ModuleName );     me.say(SectionText6);

	}
    me.say(SectionText8);
 me.say(Module.ModuleName);     me.say(SectionText10);
 me.say( Module.ModuleName );     me.say(SectionText12);
 
foreach(ModuleColumn column in Module.Columns)
{
	if(column.Key && column.EditPage == false)
	{
    me.say(SectionText14);
 me.say(column.ColumnName);     me.say(SectionText16);
 me.say(column.ColumnName);     me.say(SectionText18);
 me.say(column.ColumnName);     me.say(SectionText20);
 me.say( column.ColumnName );     me.say(SectionText22);

	}
	if(column.IsActive && column.EditPage)
	{
    me.say(SectionText24);
 me.say(column.ColumnName);     me.say(SectionText26);
 me.say(column.ColumnName);     me.say(SectionText28);
 me.say(column.ColumnName);     me.say(SectionText30);

		switch(column.InputConfiguration.InputType)
		{
			case InputType.DATETIME:
    me.say(SectionText32);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText34);
 me.say( column.ColumnName );     me.say(SectionText36);
 me.say(column.ColumnName);     me.say(SectionText38);
 me.say( column.ColumnName );     me.say(SectionText40);

			break;
			case InputType.IMAGEUPLOAD:
    me.say(SectionText42);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText44);
 me.say( column.ColumnName );     me.say(SectionText46);
 me.say( column.InputConfiguration.ConfControlName);     me.say(SectionText48);
 me.say( column.InputConfiguration.ConfFileTypes);     me.say(SectionText50);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText52);
 me.say( column.InputConfiguration.ConfSavedFolder);     me.say(SectionText54);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText56);
 me.say( column.InputConfiguration.ConfLinkPath);     me.say(SectionText58);

			break;
			case InputType.FILEUPLOAD:
    me.say(SectionText60);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText62);
 me.say( column.ColumnName );     me.say(SectionText64);
 me.say( column.InputConfiguration.ConfControlName);     me.say(SectionText66);
 me.say( column.InputConfiguration.ConfFileTypes);     me.say(SectionText68);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText70);
 me.say( column.InputConfiguration.ConfSavedFolder);     me.say(SectionText72);

			break;
			case InputType.LOOKUPCOMBO:
    me.say(SectionText74);
 me.say(column.InputConfiguration.ConfRelatedFieldName);     me.say(SectionText76);
 me.say( column.ColumnName );     me.say(SectionText78);
 me.say(column.InputConfiguration.ConfRelatedFieldName);     me.say(SectionText80);
 me.say( column.ColumnName);     me.say(SectionText82);
 me.say( column.InputConfiguration.ConfLookupBaseTableName );     me.say(SectionText84);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText86);
 me.say( column.ColumnName);     me.say(SectionText88);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText90);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText92);

			break;
			case InputType.RADIOBUTTON:
			int counter = 0;
			foreach(NameValuePairClass item in column.InputConfiguration.ConfComboItems)
			{
    me.say(SectionText94);
 me.say( column.ColumnName );     me.say(SectionText96);
 me.say(column.InputConfiguration.ConfControlName);     me.say(SectionText98);
 me.say(counter);     me.say(SectionText100);

				counter++;
			}//End of ASP For each
			
			break;
			case InputType.LOOKUPRADIOBUTTON:
    me.say(SectionText102);
 me.say(column.InputConfiguration.ConfRelatedFieldName);     me.say(SectionText104);
 me.say( column.ColumnName );     me.say(SectionText106);
 me.say(column.InputConfiguration.ConfRelatedFieldName);     me.say(SectionText108);
 me.say( column.ColumnName);     me.say(SectionText110);
 me.say( column.InputConfiguration.ConfLookupBaseTableName );     me.say(SectionText112);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText114);
 me.say( column.ColumnName);     me.say(SectionText116);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText118);
 me.say( column.InputConfiguration.ConfControlName );     me.say(SectionText120);

			break;
			case InputType.CHECKBOX:
    me.say(SectionText122);
 me.say( column.ColumnName );     me.say(SectionText124);
 me.say( column.InputConfiguration.ConfCheckValue );     me.say(SectionText126);
 me.say(column.ColumnName);     me.say(SectionText128);
 me.say(column.ColumnName);     me.say(SectionText130);

			break;
			case InputType.COMBOBOX:
				    me.say(SectionText132);

					foreach(NameValuePairClass item in column.InputConfiguration.ConfComboItems)
					{
				    me.say(SectionText134);
 me.say( item.Object.ToString() );     me.say(SectionText136);
 me.say( column.ColumnName );     me.say(SectionText138);
 me.say(column.ColumnName);     me.say(SectionText140);
 me.say( item.Object.ToString() );     me.say(SectionText142);
 me.say(column.ColumnName);     me.say(SectionText144);
 me.say( item.Object.ToString() );     me.say(SectionText146);

					}
				    me.say(SectionText148);

			break;
			default:
    me.say(SectionText150);
 me.say(column.ColumnName);     me.say(SectionText152);
 me.say( column.ColumnName );     me.say(SectionText154);

			break;


		}//End of switch
	}//End if
}//End of Foreach
    me.say(SectionText156);

	GeneratorHelper genHelper = new GeneratorHelper();
	foreach (ModuleClass childModule in Module.ChildModules)
    {
    me.say(SectionText158);
 me.say( childModule.ModuleName );     me.say(SectionText160);
 me.say( childModule.ModuleName );     me.say(SectionText162);
 me.say( childModule.ModuleName );     me.say(SectionText164);
 me.say( childModule.ModuleName );     me.say(SectionText166);
 me.say(childModule.ModuleName);     me.say(SectionText168);

	}
    me.say(SectionText170);
 me.say(Module.ModuleName);     me.say(SectionText172);
  }
}
Error on line 153: 'Soonda_Library.Controls.IInputConfigurationClass' does not contain a definition for 'ConfLinkPath' and no extension method 'ConfLinkPath' accepting a first argument of type 'Soonda_Library.Controls.IInputConfigurationClass' could be found (are you missing a using directive or an assembly reference?)