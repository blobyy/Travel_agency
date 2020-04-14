using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;

namespace Travel_agency
{
    class DataBaseConnect
    {
        private MySqlConnection connection;
        private string server;
        private string database;
        private string uid;
        private string password;


        public DataBaseConnect()
        {
            Initialize();
        }


        private void Initialize()
        {
            server = "localhost";
            database = "travel_data";
            uid = "test";
            password = "1234";
            string connectionString;
            connectionString = "SERVER=" + server + ";" + "DATABASE=" + database + ";" + "UID=" + uid + ";" + "PASSWORD=" + password + ";";

            connection = new MySqlConnection(connectionString);

        }



        private bool OpenConnection()
        {
            try
            {
                connection.Open();
                return true;
            }
            catch(MySqlException ex)
            {

                switch(ex.Number)
                {
                    case 0:
                        System.Windows.Forms.MessageBox.Show("Cannot connect to server.  Contact administrator");
                        break;

                    case 1045:
                        System.Windows.Forms.MessageBox.Show("Invalid username/password, please try again");
                        break;
                }

                return false;
            }
        }

        private bool CloseConnection()
        {
            try
            {
                connection.Close();
                return true;
            }
            catch (MySqlException ex)
            {
                System.Windows.Forms.MessageBox.Show(ex.Message);
                return false;
            }
        }

        public void Insert(string query )
        {

            if(this.OpenConnection() == true)
            {
                MySqlCommand cmd = new MySqlCommand(query, connection);

                cmd.ExecuteNonQuery();

                this.CloseConnection();
            }
        }

        


        public void Update()
        {
            
        }

        public void Delete()
        {

        }











    }
}
