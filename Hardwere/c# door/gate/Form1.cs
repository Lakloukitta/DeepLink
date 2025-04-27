namespace gate
{
    using System;
    using System.IO.Ports;
    using System.Net.Http;
    using System.Threading.Tasks;
    using System.Timers;
    public partial class Form1 : Form
    {
        static SerialPort serialPort;
        static HttpClient httpClient = new HttpClient();
        static Timer timer;
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            // Configure Serial Port
            serialPort = new SerialPort("COM9", 9600); // Replace COM3 with your Arduino COM port
            serialPort.Open();

            // Set up Timer
            timer = new Timer(1000); // 1 second interval
            timer.Elapsed += async (sender, e) => await CheckAndSendCommand();
            timer.AutoReset = true;
            timer.Enabled = true;

        }

        static async Task CheckAndSendCommand()
        {
            try
            {
                HttpResponseMessage response = await httpClient.GetAsync("https://deeplink.host/door_status.php");
                response.EnsureSuccessStatusCode();
                string content = await response.Content.ReadAsStringAsync();

                if (content.Trim() == "1")
                {
                    serialPort.WriteLine("open");
                    AppendTextToRichTextBox("Command sent: open");
                }
                else if (content.Trim() == "0")
                {
                    serialPort.WriteLine("close");
                    AppendTextToRichTextBox("Command sent: close");
                }
                else
                {
                    AppendTextToRichTextBox("Unknown server response: " + content);
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        // Helper function to safely update RichTextBox from any thread
        static void AppendTextToRichTextBox(string text)
        {
            //MessageBox.Show($"{text}");
        }
    }
}
