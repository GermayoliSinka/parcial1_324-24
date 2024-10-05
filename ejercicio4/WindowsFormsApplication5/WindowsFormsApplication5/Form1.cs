using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace WindowsFormsApplication5
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string username = textBox1.Text; // Asegúrate de tener un TextBox para el nombre de usuario
            string password = textBox2.Text; // Y otro para la contraseña

            // Conectar a la base de datos
            using (SqlConnection con = new SqlConnection("server=localhost\\SQLEXPRESS;database=BDGermayoli;user=usuario;pwd=123456"))
            {
                con.Open();
                SqlCommand cmd = new SqlCommand("SELECT COUNT(*) FROM usuario WHERE email=@username AND password=@password", con);
                cmd.Parameters.AddWithValue("@username", username);
                cmd.Parameters.AddWithValue("@password", password); // Considera usar hash para la contraseña

                int count = (int)cmd.ExecuteScalar();

                if (count > 0)
                {
                    // Usuario existe, abrir Form2
                    Form2 f2 = new Form2();
                    f2.Show();
                    this.Hide(); // Opcional: oculta el Form1
                }
                else
                {
                    MessageBox.Show("Usuario o contraseña incorrectos.");
                }
            }

        }
    }
}
