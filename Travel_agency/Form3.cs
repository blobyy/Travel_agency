using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;


namespace Travel_agency
{
    public partial class Form3 : Form
    {
        
        public Form3()
        {
            InitializeComponent();
            

        }
        
        private void LoginButton_Click(object sender, EventArgs e)
        {
            
            string login = "test123";
            string password = "123";
            string login2 = "test1234";
            string password2= "1234";

            if (LoginBox1.Text == login && PasswordBox1.Text == password)
            {

                LoadForm(new Form1());
                
            }
            else if (LoginBox1.Text == login2 && PasswordBox1.Text == password2)
            {
                LoadForm(new Form2());
            }




            
        }


        private void LoadForm(Form frm)
        {
            frm.FormClosed += new FormClosedEventHandler(frm_FormClosed);
            this.Hide();
            // Here you can set a bunch of properties, apply skins, save logs...
            // before you show any form
            frm.Show();
        }

        void frm_FormClosed(object sender, FormClosedEventArgs e)
        {
            this.Show();
        }

    }
}
