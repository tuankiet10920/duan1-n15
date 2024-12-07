</div>
    </section>
    <script>
      const xValues = [
        "Tháng 1",
        "Tháng 2",
        "Tháng 3",
        "Tháng 4",
        "Tháng 5",
        "Tháng 6",
        "Tháng 7",
        "Tháng 8",
        "Tháng 9",
        "Tháng 10",
      ];
      const yValues = [55, 49, 44, 24, 66, 33, 22, 67, 77, 29];
      const barColors = [
        "#295683",
        "#295683",
        "#295683",
        "#295683",
        "#295683",
        "#295683",
        "#295683",
        "#295683",
        "#295683",
        "#295683",
      ];

      new Chart("myChart", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [
            {
              backgroundColor: barColors,
              data: yValues,
            },
          ],
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: "Tổng số lượng sản phẩm bán được trong 5 tháng gần nhất",
          },
        },
      });
    </script>
  </body>
</html>