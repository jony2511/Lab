using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Grading
{
    public partial class lab : System.Web.UI.Page
    {
        public class GradingSystem
        {
            string student;
            int number;
            public GradingSystem()
            {
                if (HttpContext.Current.Session["a"] == null)
                    HttpContext.Current.Session["a"] = 0;
                if (HttpContext.Current.Session["b"] == null)
                    HttpContext.Current.Session["b"] = 0;
                if (HttpContext.Current.Session["c"] == null)
                    HttpContext.Current.Session["c"] = 0;
                if (HttpContext.Current.Session["f"] == null)
                    HttpContext.Current.Session["f"] = 0;
            }
            public void setGrade(int mark)
            {
                if(mark>=80 && mark<=100)
                     HttpContext.Current.Session["a"] =(int) HttpContext.Current.Session["a"] + 1;
                else if (mark >= 60 && mark<= 79)
                     HttpContext.Current.Session["b"] = (int)HttpContext.Current.Session["b"] + 1;
                if (mark >= 40 && mark<= 59)
                     HttpContext.Current.Session["c"] = (int)HttpContext.Current.Session["c"] + 1;
                if (mark >= 0 && mark<= 39)
                     HttpContext.Current.Session["f"] = (int)HttpContext.Current.Session["f"] + 1;
                
            }
        }
        protected void Page_Load(object sender, EventArgs e)
        {
            
        }
        protected void update()
        {
            a.Text = "Current Number of A+: " + HttpContext.Current.Session["a"];
            b.Text = "Current Number of B+: " + HttpContext.Current.Session["b"];
            c.Text = "Current Number of C+: " + HttpContext.Current.Session["c"];
            f.Text = "Current Number of F: " + HttpContext.Current.Session["f"];
        }
        protected void SubmitBtn(object sender, EventArgs e)
        {
            int marks;
            if(int.TryParse(mark.Text,out marks))
                {
                GradingSystem g=new GradingSystem();
                g.setGrade(marks);
                update();
            }
        }
    }
}