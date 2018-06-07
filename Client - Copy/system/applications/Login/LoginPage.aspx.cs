using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using Com.Wiseape.Utility;
using System.Collections.Specialized;
using System.Net;

public partial class system_applications_Login_LoginPage : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request["username"] != null)
        {
            string message = "";
            NameValueCollection queryString = System.Web.HttpUtility.ParseQueryString(string.Empty);
            queryString["username"] = Request.QueryString["username"];
            queryString["password"] = Request.QueryString["password"];


            string sQuery = Com.Wiseape.Utility.HttpUtility.HttpParameterListProcessor.ToQueryString(queryString);

            Com.Wiseape.Utility.OperationResult result = new OperationResult(false, null);
            using (System.Net.WebClient wc = new WebClient())
            {
                string URI = "http://localhost/";
                wc.Headers[HttpRequestHeader.ContentType] = "application/x-www-form-urlencoded";
                string HtmlResult = wc.UploadString(URI, sQuery);
            }

            if (result.Result)
            {
                Response.Write(result.Data);
                //Session["User"] = result.Data;
                //Response.Redirect("http://localhost/wiseape-app-aibis/Client");
            }
            else
            {
                message = "Login Failed";
            }
        }

    }
}