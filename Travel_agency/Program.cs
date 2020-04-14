using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Travel_agency
{
    static class Program
    {
        /// <summary>
        /// Główny punkt wejścia dla aplikacji.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new Form1());

            DataBaseConnect baza = new DataBaseConnect();
            string komenda = "INSERT INTO `trips` (`Name`, `Destination`, `Date_start`, `Date_end`) VALUES ('testghghghghg', 'testownia', '2020-04-01', '2020-04-16')";
            baza.Insert(komenda);







        }


    }
}
